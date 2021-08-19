<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAboutController;

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
Route::get('/about', [AboutUsController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/reservation', [ReservationController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

// Admin About
Route::get('/administrator', [AdminController::class, 'index'])->name('Dashboard');
Route::get('/administrator/about', [AdminAboutController::class, 'index'])->name('About');
Route::get('/administrator/about/tambah', [AdminAboutController::class, 'tambah']);
Route::post('/administrator/about/insert', [AdminAboutController::class, 'insert']);
Route::get('/administrator/about/hapus/{id}', [AdminAboutController::class, 'delete']);
Route::get('/administrator/about/detail/{id}', [AdminAboutController::class, 'detail']);
Route::get('/administrator/about/ubah/{id}', [AdminAboutController::class, 'ubah']);
