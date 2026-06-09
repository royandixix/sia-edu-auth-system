<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\OrangTuaController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensiController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use App\Http\Controllers\Siswa\AbsensiController as SiswaAbsensiController;
use App\Http\Controllers\Siswa\JadwalController as SiswaJadwalController;
use App\Http\Controllers\Siswa\PengumumanController as SiswaPengumumanController;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboardController;
use App\Http\Controllers\OrangTua\NilaiController as OrangTuaNilaiController;
use App\Http\Controllers\OrangTua\AbsensiController as OrangTuaAbsensiController;
use App\Http\Controllers\OrangTua\JadwalController as OrangTuaJadwalController;
use App\Http\Controllers\OrangTua\PengumumanController as OrangTuaPengumumanController;
use App\Http\Controllers\Kepsek\DashboardController as KepsekDashboardController;
use App\Http\Controllers\Kepsek\LaporanController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('mapel', MataPelajaranController::class);
    Route::resource('orangtua', OrangTuaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('nilai', AdminNilaiController::class);
    Route::resource('absensi', AdminAbsensiController::class);
});

Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    Route::resource('absensi', GuruAbsensiController::class);
    Route::resource('nilai', GuruNilaiController::class);
});

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
    Route::resource('nilai', SiswaNilaiController::class);
    Route::resource('absensi', SiswaAbsensiController::class);
    Route::resource('jadwal', SiswaJadwalController::class);
    Route::resource('pengumuman', SiswaPengumumanController::class);
});

Route::prefix('orangtua')->name('orangtua.')->middleware('auth.session')->group(function () {
    Route::get('/dashboard', [OrangTuaDashboardController::class, 'index'])->name('dashboard');
    Route::resource('nilai', OrangTuaNilaiController::class);
    Route::resource('absensi', OrangTuaAbsensiController::class);
    Route::resource('jadwal', OrangTuaJadwalController::class);
    Route::resource('pengumuman', OrangTuaPengumumanController::class);
});

Route::prefix('kepsek')->name('kepsek.')->group(function () {
    Route::get('/dashboard', [KepsekDashboardController::class, 'index'])->name('dashboard');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});
