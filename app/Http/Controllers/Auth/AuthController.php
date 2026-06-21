<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,guru,siswa,orang_tua,kepala_sekolah',
            'nik' => 'required_if:role,guru',
            'nisn' => 'required_if:role,siswa',
        ]);

        DB::beginTransaction();

        try {

            $token = Str::random(64);

            // 1. CREATE USER
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status_login' => false,
                'verification_token' => $token,
            ]);

            // 2. AUTO INSERT KE TABLE SESUAI ROLE
            if ($request->role === 'siswa') {
                Siswa::create([
                    'nis' => $request->nisn,
                    'nama_siswa' => $request->name,
                    'jk' => 'L',
                    'alamat' => '-',
                    'kelas_id' => 1,
                    'user_id' => $user->id,
                ]);
            }

            if ($request->role === 'guru') {
                Guru::create([
                    'nip' => $request->nik,
                    'nama_guru' => $request->name,
                    'alamat' => '-',
                    'jk' => 'L',
                    'user_id' => $user->id,
                ]);
            }

            // 3. EMAIL VERIFIKASI (FIX DI SINI)
            $link = config('app.url') . "/verify/$token";

            Mail::raw("Klik link ini untuk verifikasi akun:\n$link", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Verifikasi Akun SIAKAD')
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });

            DB::commit();

            return redirect()->route('login')
                ->with('success', 'Registrasi berhasil. Cek email untuk verifikasi.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Registrasi gagal: ' . $e->getMessage());
        }
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Link tidak valid');
        }

        if ($user->status_login) {
            return redirect('/login')->with('success', 'Sudah diverifikasi');
        }

        $user->update([
            'status_login' => true,
            'verification_token' => null,
        ]);

        Auth::login($user);
        request()->session()->regenerate();

        return redirect($this->redirectByRole($user->role));
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(function ($q) use ($request) {
                $q->where('username', $request->username)
                  ->orWhere('email', $request->username);
            })
            ->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        if (!$user->status_login) {
            return back()->with('error', 'Belum verifikasi email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect($this->redirectByRole($user->role));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectByRole($role)
    {
        return match ($role) {
            'admin' => '/admin/dashboard',
            'guru' => '/guru/dashboard',
            'siswa' => '/siswa/dashboard',
            'orang_tua' => '/orangtua/dashboard',
            'kepala_sekolah' => '/kepsek/dashboard',
            default => '/login',
        };
    }
}