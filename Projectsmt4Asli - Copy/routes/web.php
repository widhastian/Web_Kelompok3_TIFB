<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiUser;
use App\Http\Controllers\Admin\Artikel\ArtikelCtrl;
use App\Http\Controllers\Admin\Desa\DesaCtrl;
use App\Http\Controllers\Admin\Kategori\KategoriCtrl;
use App\Http\Controllers\Admin\Kecamatan\KecamatanCtrl;
use App\Http\Controllers\Admin\Petugas\Petugas;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [MultiUser::class, 'index'])->name('/');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
