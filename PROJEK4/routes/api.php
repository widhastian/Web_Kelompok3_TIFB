<?php

use App\Http\Controllers\API\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\login;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\Account;
use App\Http\Controllers\Api\kategori;
use App\Http\Controllers\API\petugas;

// jika tidak login hanya bisa mengakses dibawah ini
Route::post('/login', [login::class, 'login']);
// Route::post('/register', [RegisterController::class, 'register']);
Route::post('/register', [App\Http\Controllers\API\Auth\Account::class, 'regis']);

// Route::put('/kategori/{id}', [ktg::class, 'update']);
// Route::get('/kategori', [ktg::class, 'index']);
// Route::get('/kategori/{id}', [ktg::class, 'getKat']);
// Route::post('/kategori', [ktg::class, 'create']);
// Route::delete('/kategori/{id}', [ktg::class, 'destroy']);

// // jika sudah login & verified email maka bisa mengakses dibawah ini
// Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//     //     // Account
Route::post('/account', [Account::class, 'index']);
//     //     // Artikel
Route::get('/kategori', [kategori::class, 'index']);
Route::get('/artikel', [artikel::class, 'index']);
Route::get('/petugas', [petugas::class, 'index']);
// });
