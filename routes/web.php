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
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminGalleryController;

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
Route::get('/contact', [ContactController::class, 'index'])->name('Contact');
Route::post('/contact/insert', [ContactController::class, 'insert']);

Route::get('/administrator', [AdminController::class, 'index'])->name('Dashboard');

// Admin About
Route::get('/administrator/about', [AdminAboutController::class, 'index'])->name('About');
Route::get('/administrator/about/tambah', [AdminAboutController::class, 'tambah']);
Route::post('/administrator/about/insert', [AdminAboutController::class, 'insert']);
Route::post('/administrator/about/update/{id}', [AdminAboutController::class, 'update']);
Route::get('/administrator/about/hapus/{id}', [AdminAboutController::class, 'delete']);
Route::get('/administrator/about/detail/{id}', [AdminAboutController::class, 'detail']);
Route::get('/administrator/about/ubah/{id}', [AdminAboutController::class, 'ubah']);

// Admin Gallery
Route::get('/administrator/gallery', [AdminGalleryController::class, 'index'])->name('Gallery');
Route::get('/administrator/gallery/tambah', [AdminGalleryController::class, 'tambah']);
Route::post('/administrator/gallery/insert', [AdminGalleryController::class, 'insert']);
Route::post('/administrator/gallery/update/{id}', [AdminGalleryController::class, 'update']);
Route::get('/administrator/gallery/hapus/{id}', [AdminGalleryController::class, 'delete']);
Route::get('/administrator/gallery/detail/{id}', [AdminGalleryController::class, 'detail']);
Route::get('/administrator/gallery/ubah/{id}', [AdminGalleryController::class, 'ubah']);

// admin contact
Route::get('/administrator/inbox', [AdminContactController::class, 'index'])->name('Inbox');
Route::get('/administrator/inbox/hapus/{id}', [AdminContactController::class, 'delete']);
