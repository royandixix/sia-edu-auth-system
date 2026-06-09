<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $token = Str::random(64);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status_login' => 0,
            'verification_token' => $token
        ]);

        $link = url('/verify/' . $token);

        Mail::send('email.verify', ['link' => $link], function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Verifikasi Email');
        });

        return back()->with('success', 'Registrasi berhasil, cek email!');
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token tidak valid');
        }

        $user->update([
            'status_login' => 1,
            'verification_token' => null
        ]);

        session()->regenerate();

        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role
        ]);

        return $this->redirectByRole($user->role);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        if ($user->status_login == 0) {
            return back()->with('error', 'Akun belum diverifikasi');
        }

        session()->regenerate();

        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role
        ]);

        return $this->redirectByRole($user->role);
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login')->with('success', 'Logout berhasil');
    }

    private function redirectByRole($role)
    {
        return match ($role) {
            'admin' => redirect('/admin/dashboard'),
            'guru' => redirect('/guru/dashboard'),
            'siswa' => redirect('/siswa/dashboard'),
            'orang_tua' => redirect('/orangtua/dashboard'),
            'kepsek' => redirect('/kepsek/dashboard'),
            default => redirect('/login')
        };
    }
}