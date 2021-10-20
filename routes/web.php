<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// User
use App\Http\Controllers\HomeController as HomeUserController;
use App\Http\Controllers\AboutController as AboutUserController;
use App\Http\Controllers\Laboratory\EquipmentController as EquipmentLaboratoryUserController;
use App\Http\Controllers\Laboratory\TestController as TestLaboratoryUserController;
use App\Http\Controllers\Laboratory\PracticeController as PracticeLaboratoryUserController;
use App\Http\Controllers\Laboratory\BlogController as BlogLaboratoryUserController;
use App\Http\Controllers\BlogController as BlogUserControler;
use App\Http\Controllers\ContactController as ContactUserController;

// Admin
use App\Http\Controllers\Admin\Dashboard as DashboardAdminController;
use App\Http\Controllers\Admin\AboutController as AboutAdminController;
use App\Http\Controllers\Admin\ContactController as ContactAdminController;
use App\Http\Controllers\Admin\LaboratoryController as LaboratoryAdminController;
use App\Http\Controllers\Admin\SlideShowController as SlideShowAdminController;
use App\Http\Controllers\Admin\BlogController as BlogAdminController;

use Illuminate\Support\Str;

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

Route::get('/', [HomeUserController::class, 'index'])->name('home');
Route::get('/home', [HomeUserController::class, 'index'])->name('home');
Route::get('/profil', [AboutUserController::class, 'index'])->name('about');
Route::prefix('/laboratorium/{slug}/')->name('laboratory.')->group(function () {
    Route::get('/', [EquipmentLaboratoryUserController::class, 'index'])->name('equipment');
    Route::get('peralatan', [EquipmentLaboratoryUserController::class, 'index'])->name('equipment');
    Route::get('peralatan/{id}', [EquipmentLaboratoryUserController::class, 'show'])->name('equipment.show');
    Route::get('pengujian', [TestLaboratoryUserController::class, 'index'])->name('test');
    Route::get('praktikum', [PracticeLaboratoryUserController::class, 'index'])->name('practice');
    Route::get('berita', [BlogLaboratoryUserController::class, 'index'])->name('blog');
});
Route::get('/berita', [BlogUserControler::class, 'index'])->name('blog');
Route::get('/berita/{slug}', [BlogUserControler::class, 'show'])->name('blog.show');
Route::get('/berita/kategori/{slug}', [BlogUserControler::class, 'category'])->name('blog.category');
Route::get('/berita/tag/{slug}', [BlogUserControler::class, 'tag'])->name('blog.tag');
Route::get('/kontak', [ContactUserController::class, 'index'])->name('contact');

// ADMIN
Route::prefix('/admin/')->name('admin.')->group(function () {
    // Main
    Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');
    Route::get('laboratorium', [LaboratoryAdminController::class, 'index'])->name('laboratories.index');
    Route::post('laboratorium', [LaboratoryAdminController::class, 'store'])->name('laboratories.store');
    Route::get('laboratorium/{laboratory}/edit', [LaboratoryAdminController::class, 'edit'])->name('laboratories.edit');
    Route::put('laboratorium/{laboratory}', [LaboratoryAdminController::class, 'update'])->name('laboratories.update');
    Route::delete('laboratorium/{laboratory}', [LaboratoryAdminController::class, 'destroy'])->name('laboratories.destroy');
    // Content
    Route::get('slide-show', [SlideShowAdminController::class, 'index'])->name('slide-show.index');
    Route::put('slide-show', [SlideShowAdminController::class, 'update'])->name('slide-show.update');
    Route::get('profil', [AboutAdminController::class, 'index'])->name('abouts.index');
    Route::put('profil', [AboutAdminController::class, 'update'])->name('abouts.update');
    Route::get('kontak', [ContactAdminController::class, 'index'])->name('contacts.index');
    Route::put('kontak', [ContactAdminController::class, 'update'])->name('contacts.update');
    Route::get('berita', [BlogAdminController::class, 'index'])->name('blog.index');
});

Route::get('test', function () {
    $test = request()->url();
    dd($test);
})->name('test');
