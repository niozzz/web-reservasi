<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SettingHomepageController;

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

Auth::routes();

Route::get('/', [HomepageController::class, 'index']);
Route::get('/about', [AboutUsController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/reservation', [ReservationController::class, 'index']);
Route::get('/reservation/data-admin', [ReservationController::class, 'tampilDataAdmin']);
Route::get('/reservation/data-user', [ReservationController::class, 'tampilDataUser']);
Route::get('/contact', [ContactController::class, 'index'])->name('Contact');
Route::post('/contact/insert', [ContactController::class, 'insert']);






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/administrator', [AdminController::class, 'index'])->name('Dashboard');
    Route::post('/administrator/ubah-kategori', [AdminController::class, 'ubahKategori']);
    Route::post('/administrator/ubah-menu', [AdminController::class, 'ubahMenu']);


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

    // admin menu
    Route::get('/administrator/menu', [AdminMenuController::class, 'index'])->name('Menu');
    Route::get('/administrator/menu/tambah', [AdminMenuController::class, 'tambah']);
    Route::post('/administrator/menu/insert', [AdminMenuController::class, 'insert']);
    Route::post('/administrator/menu/update/{id}', [AdminMenuController::class, 'update']);
    Route::get('/administrator/menu/hapus/{id}', [AdminMenuController::class, 'delete']);
    Route::get('/administrator/menu/ubah/{id}', [AdminMenuController::class, 'ubah']);

    // admin reservation
    Route::get('/administrator/reservation', [AdminReservationController::class, 'index'])->name('AdminReservation');
    Route::get('/administrator/reservation/tambah', [AdminReservationController::class, 'tambah']);
    Route::post('/administrator/reservation/insert', [AdminReservationController::class, 'insert']);
    Route::post('/administrator/reservation/update/{id}', [AdminReservationController::class, 'update']);
    Route::post('/administrator/reservation/update-link', [AdminReservationController::class, 'updateLink']);
    Route::post('/administrator/reservation/update-slot', [AdminReservationController::class, 'updateSlot']);
    Route::get('/administrator/reservation/hapus/{id}', [AdminReservationController::class, 'delete']);
    Route::post('/administrator/reservation/confirm', [AdminReservationController::class, 'confirm']);
    Route::get('/administrator/reservation/ubah/{id}', [AdminReservationController::class, 'ubah']);

    // admin profile
    Route::get('/administrator/profile', [AdminProfileController::class, 'index'])->name('AdminProfile');
    Route::post('/administrator/profile/update', [AdminProfileController::class, 'update']);

    // setting homepage
    Route::get('/administrator/setting/homepage', [SettingHomepageController::class, 'index'])->name('SettingHomepage');
    Route::get('/administrator/setting/homepage/ubah/{id}', [SettingHomepageController::class, 'ubah']);
    Route::post('/administrator/setting/homepage/update/{id}', [SettingHomepageController::class, 'update']);
});

Route::group(['middleware' => 'user'], function () {
    // user reservation
    Route::get('/user/reservation', [UserReservationController::class, 'index'])->name('UserReservation');
    Route::get('/user/reservation/tambah', [UserReservationController::class, 'tambah']);
    Route::post('/user/reservation/insert', [UserReservationController::class, 'insert']);
    Route::post('/user/reservation/update/{id}', [UserReservationController::class, 'update']);
    Route::post('/user/reservation/update-link', [UserReservationController::class, 'updateLink']);
    Route::get('/user/reservation/hapus/{id}', [UserReservationController::class, 'delete']);
    Route::get('/user/reservation/ubah/{id}', [UserReservationController::class, 'ubah']);

    // user profile
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('UserProfile');
    Route::post('/user/profile/update', [UserProfileController::class, 'update']);
});