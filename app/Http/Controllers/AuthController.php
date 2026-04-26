<?php

namespace App\Http\Controllers;

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
            'password' => 'required|min:6'
        ]);

        $token = Str::random(64);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status_login' => 0,
            'verification_token' => $token
        ]);

        $link = url('/verify/' . $token);

        Mail::send('email.verify', ['link' => $link], function ($message) use ($request) {
            $message->to($request->email)->subject('Verifikasi Email');
        });

        return back()->with('success', 'Registrasi berhasil, cek email!');
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token tidak valid');
        }

        $user->status_login = 1;
        $user->verification_token = null;
        $user->save();

        session([
            'user_id' => $user->id,
            'username' => $user->username
        ]);

        return redirect('/dashboard')->with('success', 'Verifikasi berhasil');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->username;
        $password = $request->password;

        $user = User::where('username', $login)
            ->orWhere('email', $login)
            ->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        if ($user->status_login == 0) {
            return back()->with('error', 'Akun belum diverifikasi');
        }

        session([
            'user_id' => $user->id,
            'username' => $user->username
        ]);

        return redirect('/dashboard')->with('success', 'Login berhasil');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Logout berhasil');
    }

    public function dashboard()
    {
        if (!session('user_id')) {
            return redirect('/login')->with('error', 'Silakan login dulu');
        }

        return view('admin.dashboard.index'); // ✅ FIX DI SINI
    }
}