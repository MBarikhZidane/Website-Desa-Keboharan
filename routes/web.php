<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\ProfildesaController;
use App\Http\Controllers\KependudukanController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [BerandaController::class, 'showdashboard'])->name('home');

    Route::controller(KependudukanController::class)->prefix('kependudukan')->name('kependudukan.')->group(function () {
        Route::get('/agama', 'viewAgama')->name('agama');
        Route::get('/dusun', 'viewDusun')->name('dusun');
        Route::get('/pendidikan', 'viewPendidikan')->name('pendidikan');
    });

    // Anggaran
    Route::controller(AnggaranController::class)->prefix('anggaran')->name('anggaran.')->group(function () {
        Route::get('/pendapatan', 'viewpendapatan')->name('pendapatan');
        Route::get('/pengeluaran', 'viewpengeluaran')->name('pengeluaran');
    });

    // Profil Desa
    Route::controller(ProfildesaController::class)->prefix('profil-desa')->name('profil-desa.')->group(function () {
        Route::get('/carousel', 'viewcarousel')->name('carousel');
        Route::get('/visimisi', 'viewvisimisi')->name('visimisi');
        Route::get('/petalokasi', 'viewpetalokasi')->name('petalokasi');
        Route::get('/organisasi', [ProfildesaController::class, 'vieworganisasi'])->name('organisasi');
    });

    // Lain-lain
    Route::get('/produk', [ProfildesaController::class, 'viewproduk'])->name('produk');
    Route::get('/berita', [ProfildesaController::class, 'viewberita'])->name('berita');
    Route::get('/galeri', [ProfildesaController::class, 'viewgaleri'])->name('galeri');
    Route::get('/setting', [ProfildesaController::class, 'viewsetting'])->name('setting');
});





Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [BerandaController::class, 'profil'])->name('profil');
Route::get('/infografis', [BerandaController::class, 'infografis'])->name('infografis');
Route::get('/apbdes', [BerandaController::class, 'apbdes'])->name('apbdes');
Route::get('/belanja', [BerandaController::class, 'belanja'])->name('belanja');
Route::get('/berita', [BerandaController::class, 'berita'])->name('berita');
Route::get('/belanja/{id}', [BerandaController::class, 'showbelanja'])->name('showbelanja');
Route::get('/berita/{slug}', [BerandaController::class, 'showberita'])->name('beritashow');
