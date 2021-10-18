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

// Super Admin
use App\Http\Controllers\SuperAdmin\Dashboard as DashboardSuperAdmin;

// Admin
use App\Http\Controllers\Admin\Dashboard as DashboardAdmin;
use App\Models\Laboratory;

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
Route::prefix('/admin/')->name('admin.')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [DashboardAdmin::class, 'index'])->name('dashboard.index');
});

// SUPER ADMIN
Route::prefix('/super-admin/')->name('super-admin.')->middleware('role:super-admin')->group(function () {
    Route::get('dashboard', [DashboardSuperAdmin::class, 'index'])->name('dashboard.index');
});

Route::get('test', function () {
    // 
});
