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
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ], [
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 6 karakter'
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

        return back()->with('success', 'Registrasi berhasil, cek email untuk verifikasi!');
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
        session(['user' => $user->username]);
        return redirect('/dashboard')->with('success', 'Verifikasi berhasil, anda langsung login');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Maaf user dan password anda salah');
        }
        if ($user->status_login == 0) {
            return back()->with('error', 'Maaf user anda belum di verifikasi');
        }
        session(['user' => $user->username]);
        return redirect('/dashboard')->with('success', 'Selamat anda berhasil login');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login')->with('success', 'Berhasil logout');
    }

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }
        return view('dashboard.index');
    }
}
