<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiUser;
use App\Http\Controllers\Admin\Artikel\ArtikelCtrl;
use App\Http\Controllers\Admin\Desa\DesaCtrl;
use App\Http\Controllers\Admin\Kategori\KategoriCtrl;
use App\Http\Controllers\Admin\Kecamatan\KecamatanCtrl;
use App\Http\Controllers\Admin\Petugas\Petugas;
use App\Http\Controllers\LandingPage\ChatCtrl; // chat landing
use App\Http\Controllers\Admin\Chat\ChatCtrl as ChatAdmin; // chat admin
use App\Http\Controllers\Admin\User\UserCtrl;
use App\Http\Controllers\LandingPage\ArtikelCtrl as LandingPageArtikelCtrl;
use App\Http\Controllers\LandingPage\artikelLanding;
use App\Http\Controllers\LandingPage\profileCtrl;

// Route::get('/', function () {
//     return view('welcome');
// });

// setelah berhasil login dan menentukan hak akses user
Auth::routes();
Route::get('/', [MultiUser::class, 'index'])->name('home');
Route::view('/page-login', 'content-landing.page-login')->name('page-login');
Route::view('/page-register', 'content-landing.page-register')->name('page-register');
// Route::view('/', 'frontend.beranda')->name('front-home');
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
    Route::post('/artikel-update/{id}', [ArtikelCtrl::class, 'update'])->name('artikelUpdate');
    Route::get('artikel-delete/{id}', [ArtikelCtrl::class, 'destroy'])->name('deleteArt');

    //profil
    Route::get('/profile', [UserCtrl::class, 'index'])->name('admin-users');
    Route::post('/profile-update/{id}', [UserCtrl::class, 'updateAkun'])->name('admin-akunUpdate');
    Route::post('/profile-updateFoto/{id}', [UserCtrl::class, 'updateFoto'])->name('admin-updateFoto');

    // chat Admin
    Route::get('/chat-room', [ChatAdmin::class, 'index'])->name('admin-chat');
    Route::post('/chat-show', [ChatAdmin::class, 'show'])->name('admin-chatShow');
    Route::post('/chat-amstore', [ChatAdmin::class, 'store'])->name('admin-chatStore');
    Route::post('/chat-amRealtime', [ChatAdmin::class, 'realtimeAdmin'])->name('admin-chatRealtime');

    // chat Landing
    Route::get('/chat', [ChatCtrl::class, 'index'])->name('landing-chat');
    Route::post('/chat-store', [ChatCtrl::class, 'store'])->name('landing-chatStore');
    Route::post('/chat-realtime', [ChatCtrl::class, 'realtimeLanding'])->name('landing-chatRealtime');

    //profile petani
    Route::get('/Myprofile', [profileCtrl::class, 'index'])->name('landing-users');
    Route::post('/Myprofile-update/{id}', [profileCtrl::class, 'update'])->name('landing-usersUpdate');
    Route::post('/Myprofile-updateFoto/{id}', [profileCtrl::class, 'updateFoto'])->name('landing-usersUpdateFoto');

    //artikelLandingPage
    Route::get('/ArtikelLanding', [artikelLanding::class, 'index'])->name('artikelLan');
    Route::get('/detailArtikel/{id}', [artikelLanding::class, 'detail'])->name('isi');
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', function () {
    //     return view('contentadmin.beranda');
// });

// Route::get('/log', function () {
//     return view('layouts.loginpage.login');
// });
