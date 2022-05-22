<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Artikel\ArtikelCtrl;
use App\Http\Controllers\Admin\Desa\DesaCtrl;
use App\Http\Controllers\Admin\Kategori\KategoriCtrl;
use App\Http\Controllers\Admin\Kecamatan\KecamatanCtrl;
use App\Http\Controllers\MultiUser;
use App\Http\Controllers\Admin\Petugas\Petugas;

// Route::get('/', function () {
//     return view('welcome');
// });

// setelah berhasil login dan menentukan hak akses user
Auth::routes();
Route::get('/', [MultiUser::class, 'index'])->name('/');
// Route::get('/login', [LoginController::class, 'getLogin'])->name('/login');
// Route::get('auth/login', 'Auth\AuthController@getLogin');

// middleware akan jalan ketika sudah login
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/petugas', [Petugas::class, 'index'])->name('admin-petugas');
    // URL untuk admin
    Route::post('/petugas-store', [Petugas::class, 'store'])->name('admin-petugasStore');
    Route::post('/petugas-update/{id}', [Petugas::class, 'update'])->name('admin-petugasUpdate');
    Route::get('/petugas-delete/{id}', [Petugas::class, 'destroy'])->name('delete');

    //kecamatan
    Route::get('/kecamatan', [KecamatanCtrl::class, 'index'])->name('admin-kecamatan');
    Route::post('/kecamatan-store', [KecamatanCtrl::class, 'store'])->name('admin-kecamatanStore');
    Route::post('/kecamatan-update/{id}', [KecamatanCtrl::class, 'update'])->name('admin-UpdateKec');
    Route::get('/kecamatan-delete/{id}', [KecamatanCtrl::class, 'destroy'])->name('deleteKec');

    //desa
    Route::get('/desa', [DesaCtrl::class, 'index'])->name('admin-desa');
    Route::post('/desa-store', [DesaCtrl::class, 'store'])->name('admin-desaStore');
    Route::post('/desa-update/{id}', [DesaCtrl::class, 'update'])->name('admin-UpdateDes');
    Route::get('/des-delete/{id}', [DesaCtrl::class, 'destroy'])->name('deleteDes');

    //kategori
    Route::get('/kategori', [KategoriCtrl::class, 'index'])->name('admin-kategori');
    Route::post('/kategoriStore', [KategoriCtrl::class, 'store'])->name('admin-kategoriStore');
    Route::post('/kategoriUpdate/{id}', [KategoriCtrl::class, 'update'])->name('admin-kategoriUpdate');
    Route::get('/kategoriDelete/{id}', [KategoriCtrl::class, 'destroy'])->name('deleteKtg');

    //artikel
    Route::get('/artikel', [ArtikelCtrl::class, 'index'])->name('admin-artikel');
    Route::post('/artikelStore', [ArtikelCtrl::class, 'store'])->name('admin-artikelStore');
    Route::post('/artikel-update/{id}', [ArtikelCtrl::class, 'update'])->name('admin-artikelUpdate');
    Route::get('artikel-delete/{id}', [ArtikelCtrl::class, 'destroy'])->name('deleteArt');
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', function () {
//     return view('contentadmin.beranda');
// });

// Route::get('/log', function () {
//     return view('layouts.loginpage.login');
// });
