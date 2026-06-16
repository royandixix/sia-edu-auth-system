<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    SiswaController,
    GuruController,
    KelasController,
    MataPelajaranController,
    JadwalController,
    PengumumanController,
    OrangTuaController,
    NilaiController as AdminNilaiController,
    AbsensiController as AdminAbsensiController
};
use App\Http\Controllers\Guru\{
    DashboardController as GuruDashboardController,
    AbsensiController as GuruAbsensiController,
    NilaiController as GuruNilaiController
};
use App\Http\Controllers\Siswa\{
    DashboardController as SiswaDashboardController,
    NilaiController as SiswaNilaiController,
    AbsensiController as SiswaAbsensiController,
    JadwalController as SiswaJadwalController,
    PengumumanController as SiswaPengumumanController
};
use App\Http\Controllers\OrangTua\{
    DashboardController as OrangTuaDashboardController,
    NilaiController as OrangTuaNilaiController,
    AbsensiController as OrangTuaAbsensiController,
    JadwalController as OrangTuaJadwalController,
    PengumumanController as OrangTuaPengumumanController
};
use App\Http\Controllers\Kepsek\{
    DashboardController as KepsekDashboardController,
    LaporanController
};

Route::get('/', function () {
    return redirect('/login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/verify/{token}', 'verify')->name('verify');
    Route::get('/logout', 'logout')->name('logout');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth.session', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'siswa' => SiswaController::class,
            'guru' => GuruController::class,
            'kelas' => KelasController::class,
            'mapel' => MataPelajaranController::class,
            'orangtua' => OrangTuaController::class,
            'jadwal' => JadwalController::class,
            'pengumuman' => PengumumanController::class,
            'nilai' => AdminNilaiController::class,
            'absensi' => AdminAbsensiController::class,
        ]);
    });

Route::prefix('guru')
    ->name('guru.')
    ->middleware(['auth.session', 'role:guru'])
    ->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'absensi' => GuruAbsensiController::class,
            'nilai' => GuruNilaiController::class,
        ]);
    });

Route::prefix('siswa')
    ->name('siswa.')
    ->middleware(['auth.session', 'role:siswa'])
    ->group(function () {
        Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'nilai' => SiswaNilaiController::class,
            'absensi' => SiswaAbsensiController::class,
            'jadwal' => SiswaJadwalController::class,
            'pengumuman' => SiswaPengumumanController::class,
        ]);
    });

Route::prefix('orangtua')
    ->name('orangtua.')
    ->middleware(['auth.session', 'role:orang_tua'])
    ->group(function () {
        Route::get('/dashboard', [OrangTuaDashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'nilai' => OrangTuaNilaiController::class,
            'absensi' => OrangTuaAbsensiController::class,
            'jadwal' => OrangTuaJadwalController::class,
            'pengumuman' => OrangTuaPengumumanController::class,
        ]);
    });

Route::prefix('kepsek')
    ->name('kepsek.')
    ->middleware(['auth.session', 'role:kepsek'])
    ->group(function () {
        Route::get('/dashboard', [KepsekDashboardController::class, 'index'])->name('dashboard');

        Route::controller(LaporanController::class)->prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/cetak', 'cetak')->name('cetak');
        });
    });
