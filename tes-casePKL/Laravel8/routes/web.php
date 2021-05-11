<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
route::get('/komentar',[KomentarController::class, 'index']);

route::get('/berita', [BeritaController::class, 'index'])->name('berita');
route::get('/berita/detail/{id_berita}', [BeritaController::class, 'detail']);
route::get('/berita/tambah', [BeritaController::class, 'tambah']);
route::post('/berita/insert', [BeritaController::class, 'insert']);
route::get('/berita/edit', [BeritaController::class, 'edit']);
route::get('/berita/delete/{id_berita}', [BeritaController::class, 'delete']);

route::get('/user', [UserController::class, 'index'])->name('user');
route::get('/user/detail/{id_user}', [UserController::class, 'detail'])->name('detail');
route::get('/user/profile/', [UserController::class, 'profile'])->name('profile');
//route::get('/user/editprofile/{{ Auth::user()->id }}', [UserController::class, 'editprofile'])->name('editprofile');
route::get('/user/tambah', [UserController::class, 'tambah']);
route::post('/user/insert', [UserController::class, 'insert']);
route::get('/user/edit/{id_user}', [UserController::class, 'edit']);
route::post('/user/update/{id_user}', [UserController::class, 'update']);
route::get('/user/delete/{id_user}', [UserController::class, 'delete']);

route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
