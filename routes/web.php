<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\FrontController;
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

Route::middleware(['web', 'disableBackButton'])->group(function(){
    Route::middleware(['disableRedirectToLoginPage'])->group(function(){
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('post/login', [AuthenticationController::class, 'postLogin'])->name('post.login');
    });
    
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:web', 'disableBackButton', 'user'])->group(function(){
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/index', [FrontController::class, 'index'])->name('index');
    Route::get('/produk', [FrontController::class, 'produk'])->name('produk');
    
    Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->name('admin.')->group(function(){
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('user', UserContoller::class);
            Route::resource('kategori', KategoriController::class);
            Route::resource('wilayah', WilayahController::class);
            Route::resource('shelter', ShelterController::class);
            Route::resource('umkm', UMKMController::class);
            Route::resource('produk', ProdukController::class);
            Route::get('shelter/{shelterId}/booth', [ShelterBoothController::class, 'index'])->name('shelter.booth.index');
            Route::post('shelter/{shelterId}/booth/store', [ShelterBoothController::class, 'store'])->name('shelter.booth.store');
            Route::put('shelter/{shelterId}/booth/{id}/update', [ShelterBoothController::class, 'update'])->name('shelter.booth.update');
            Route::delete('shelter/{shelterId}/booth/{id}/delete', [ShelterBoothController::class, 'delete'])->name('shelter.booth.delete');
            Route::resource('booth', BoothController::class);
        });
    });
});
