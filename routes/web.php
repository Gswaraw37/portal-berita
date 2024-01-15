<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TulisanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/berita/{slug}', [HomeController::class, 'show']);

Route::get('/search', [BeritaController::class, 'index']);

Route::get('/kategori/{kategori}', [KategoriController::class, 'show']);

Route::get('/profile/{username}', [ProfileController::class, 'show']);
Route::get('/profile/edit/{username}', [ProfileController::class, 'edit']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::delete('/berita/{id}', [ProfileController::class, 'destroy']);

Route::get('/buat-tulisan', [TulisanController::class, 'create']);
Route::post('/buat-tulisan/create', [TulisanController::class, 'store']);
Route::get('/edit-tulisan/update/{id}', [TulisanController::class, 'edit']);
Route::put('/edit-tulisan/{id}', [TulisanController::class, 'update']);
Route::get('/buat-tulisan/checkSlug', [TulisanController::class, 'checkSlug']);
Route::get('/tulisan/{slug}', [TulisanController::class, 'show']);

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/berita/checkSlug', [BeritaController::class, 'checkSlug'])->middleware('auth');
// Route::resource('/berita', [BeritaController::class])->middleware('auth');
