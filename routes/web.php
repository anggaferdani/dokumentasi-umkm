<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShelterBoothController;
use App\Http\Controllers\AuthenticationController;

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

Route::get('forgot-password', [AuthenticationController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [AuthenticationController::class, 'forgotPasswordPost'])->name('forgot-password-post');
Route::get('reset-password/{id}', [AuthenticationController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password/{id}', [AuthenticationController::class, 'resetPasswordPost'])->name('reset-password-post');

Route::middleware(['web', 'disableBackButton'])->group(function(){
    Route::middleware(['disableRedirectToLoginPage'])->group(function(){
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('login', [AuthenticationController::class, 'postLogin'])->name('post.login');
    });
    
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:web', 'disableBackButton', 'user'])->group(function(){
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/index', [FrontController::class, 'index'])->name('index');
    Route::get('/produk', [FrontController::class, 'produk'])->name('produk');
    
    Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->name('admin.')->group(function(){
            Route::get('/profile', [AuthenticationController::class, 'profile'])->name('profile');
            Route::put('/profile/{id}/update', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('user', UserContoller::class);
            Route::resource('admin', AdminController::class);
            Route::resource('kategori', KategoriController::class);
            Route::resource('wilayah', WilayahController::class);
            Route::resource('shelter', ShelterController::class);
            Route::resource('umkm', UMKMController::class);
            Route::get('umkm/{id}/produk', [UMKMController::class, 'produk'])->name('umkm.produk');
            Route::get('umkm/{id}/produk/create', [UMKMController::class, 'produkCreate'])->name('umkm.produk.create');
            Route::post('umkm/{id}/produk/store', [UMKMController::class, 'produkStore'])->name('umkm.produk.store');
            Route::get('umkm/{id}/produk/{produk_id}/edit', [UMKMController::class, 'produkEdit'])->name('umkm.produk.edit');
            Route::put('umkm/{id}/produk/{produk_id}/update', [UMKMController::class, 'produkUpdate'])->name('umkm.produk.update');
            Route::delete('umkm/{id}/produk/{produk_id}/delete', [UMKMController::class, 'produkDestroy'])->name('umkm.produk.destroy');
            Route::resource('produk', ProdukController::class);
            Route::get('shelter/{shelterId}/booth', [ShelterBoothController::class, 'index'])->name('shelter.booth.index');

            Route::get('/get-subdistricts', [LokasiController::class, 'getSubdistricts']);
        });
    });
});
