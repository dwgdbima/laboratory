<?php

use App\Events\AcceptanceOrder as EventsAcceptanceOrder;
use App\Events\OrderAcceptance;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// User
use App\Http\Controllers\HomeController as HomeUserController;
use App\Http\Controllers\AboutController as AboutUserController;
use App\Http\Controllers\Laboratory\EquipmentController as EquipmentLaboratoryUserController;
use App\Http\Controllers\Laboratory\TestController as TestLaboratoryUserController;
use App\Http\Controllers\Laboratory\PracticeController as PracticeLaboratoryUserController;
use App\Http\Controllers\Laboratory\BlogController as BlogLaboratoryUserController;
use App\Http\Controllers\BlogController as BlogUserControler;
use App\Http\Controllers\ContactController as ContactUserController;
use App\Http\Controllers\OrderController as OrderUserController;
use App\Http\Controllers\ServiceController as ServiceUserController;

// Admin
use App\Http\Controllers\Admin\Dashboard as DashboardAdminController;
use App\Http\Controllers\Admin\AboutController as AboutAdminController;
use App\Http\Controllers\Admin\ContactController as ContactAdminController;
use App\Http\Controllers\Admin\LaboratoryController as LaboratoryAdminController;
use App\Http\Controllers\Admin\SlideShowController as SlideShowAdminController;
use App\Http\Controllers\Admin\BlogController as BlogAdminController;
use App\Http\Controllers\Admin\ComponentController as ComponentAdminController;
use App\Http\Controllers\Admin\EquipmentController as EquipmentAdminController;
use App\Http\Controllers\Admin\TestController as TestAdminController;
use App\Http\Controllers\Admin\PracticeController as PracticeAdminController;
use App\Http\Controllers\Admin\LaboratoryDetailController as LaboratoryDetailAdminController;
use App\Http\Controllers\Admin\ServiceController as ServiceAdminController;
use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Mail\AcceptanceOrder;
use App\Mail\UnpaidOrder;
use App\Models\Laboratory;
use App\Models\Order;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

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
Route::get('/layanan', [ServiceUserController::class, 'index'])->name('service');
Route::get('/layanan/{service}', [ServiceUserController::class, 'show'])->name('service.show');
Route::get('/order-get/{id}', [OrderUserController::class, 'getAll'])->name('orders.get');
Route::post('/order', [OrderUserController::class, 'store'])->name('order.store');
Route::get('/bukti-pembayaran/{order_id}/{token}', [OrderUserController::class, 'paymentProof'])->name('payment.proof');
Route::post('/bukti-pembayaran', [OrderUserController::class, 'storePaymentProof'])->name('payment.proof.store');

// ADMIN
Route::prefix('/admin/')->name('admin.')->group(function () {
    // Main
    Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');
    // Laboratory
    Route::get('laboratorium', [LaboratoryAdminController::class, 'index'])->name('laboratories.index');
    Route::post('laboratorium', [LaboratoryAdminController::class, 'store'])->name('laboratories.store');
    Route::get('laboratorium/{laboratory}/edit', [LaboratoryAdminController::class, 'edit'])->name('laboratories.edit');
    Route::put('laboratorium/{laboratory}', [LaboratoryAdminController::class, 'update'])->name('laboratories.update');
    Route::delete('laboratorium/{laboratory}', [LaboratoryAdminController::class, 'destroy'])->name('laboratories.destroy');
    // Equipment
    Route::resource('peralatan', EquipmentAdminController::class)->parameter('peralatan', 'equipment')->names([
        'index' => 'equipment.index',
        'create' => 'equipment.create',
        'store' => 'equipment.store',
        'show' => 'equipment.show',
        'edit' => 'equipment.edit',
        'update' => 'equipment.update',
        'destroy' => 'equipment.destroy',
    ]);
    // Testing
    Route::get('pengujian', [TestAdminController::class, 'index'])->name('tests.index');
    Route::post('pengujian', [TestAdminController::class, 'store'])->name('tests.store');
    Route::get('pengujian/{test}/edit', [TestAdminController::class, 'edit'])->name('tests.edit');
    Route::put('pengujian/{test}', [TestAdminController::class, 'update'])->name('tests.update');
    Route::delete('pengujian/{test}', [TestAdminController::class, 'destroy'])->name('tests.destroy');
    // Practice
    Route::get('praktikum', [PracticeAdminController::class, 'index'])->name('practices.index');
    Route::post('praktikum', [PracticeAdminController::class, 'store'])->name('practices.store');
    Route::get('praktikum/{practice}/edit', [PracticeAdminController::class, 'edit'])->name('practices.edit');
    Route::put('praktikum/{practice}', [PracticeAdminController::class, 'update'])->name('practices.update');
    Route::delete('praktikum/{practice}', [PracticeAdminController::class, 'destroy'])->name('practices.destroy');

    // Service
    Route::get('layanan', [ServiceAdminController::class, 'index'])->name('services.index');
    Route::post('layanan', [ServiceAdminController::class, 'store'])->name('services.store');
    Route::put('layanan/{service}', [ServiceAdminController::class, 'update'])->name('services.update');
    Route::delete('layanan/{service}', [ServiceAdminController::class, 'destroy'])->name('services.destroy');

    // Order
    Route::get('pesanan', [OrderAdminController::class, 'index'])->name('orders.index');
    Route::get('pesanan/{order}', [OrderAdminController::class, 'show'])->name('orders.show');
    Route::post('pesanan/persetujuan/{order}', [OrderAdminController::class, 'acceptance'])->name('orders.acceptance');
    Route::post('pesanan/pembayaran/{order}', [OrderAdminController::class, 'payment'])->name('orders.payment');
    Route::delete('pesanan/{order}', [OrderAdminController::class, 'destroy'])->name('orders.destroy');

    // Content
    Route::get('slide-show', [SlideShowAdminController::class, 'index'])->name('slide-show.index');
    Route::put('slide-show', [SlideShowAdminController::class, 'update'])->name('slide-show.update');
    Route::get('komponen', [ComponentAdminController::class, 'index'])->name('component.index');
    Route::put('komponen', [ComponentAdminController::class, 'update'])->name('component.update');
    Route::get('profil', [AboutAdminController::class, 'index'])->name('about.index');
    Route::put('profil', [AboutAdminController::class, 'update'])->name('about.update');
    Route::get('kontak', [ContactAdminController::class, 'index'])->name('contact.index');
    Route::put('kontak', [ContactAdminController::class, 'update'])->name('contact.update');
    // Blog
    Route::resource('berita', BlogAdminController::class)->parameter('berita', 'blog')->names([
        'index' => 'blogs.index',
        'create' => 'blogs.create',
        'store' => 'blogs.store',
        'show' => 'blogs.show',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'destroy' => 'blogs.destroy',
    ]);
    Route::get('lab-detail', [LaboratoryDetailAdminController::class, 'index'])->name('lab.index');
    Route::put('lab-detail', [LaboratoryDetailAdminController::class, 'update'])->name('lab.update');
});

Route::post('categories', [App\Http\Controllers\CategoryController::class, 'getCategories'])->name('categories');
Route::post('tags', [App\Http\Controllers\TagController::class, 'getTags'])->name('tags');
Route::post('get-laboratories', [App\Http\Controllers\LaboratoryController::class, 'getLaboratories'])->name('getlaboratories');
Route::post('get-laboratory', [App\Http\Controllers\LaboratoryController::class, 'getLaboratory'])->name('getlaboratory');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'role:super-admin|admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('file/{path}/show', function($path) {
    $file = Storage::get($path);
    $type = Str::afterLast($path, '.');

    $response = Response::make($file, 200);
    $response->header("Content-type", $type);

    return $response;
})->where('path', '.*')->middleware(['role:super-admin'])->name('files.show');

Route::get('test', function () {
    $order = Order::find(2);

    return view('pdf.invoice', compact('order'));
})->name('test');
