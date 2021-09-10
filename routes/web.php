<?php

use Illuminate\Support\Facades\Route;

// Super Admin
use App\Http\Controllers\SuperAdmin\Dashboard as DashboardSuperAdmin;

// Admin
use App\Http\Controllers\Admin\Dashboard as DashboardAdmin;

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

Route::get('/', function () {
    return view('web.user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::prefix('/admin/')->name('admin.')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [DashboardAdmin::class, 'index'])->name('dashboard.index');
});

// SUPER ADMIN
Route::prefix('/super-admin/')->name('super-admin.')->middleware('role:super-admin')->group(function () {
    Route::get('dashboard', [DashboardSuperAdmin::class, 'index'])->name('dashboard.index');
});
