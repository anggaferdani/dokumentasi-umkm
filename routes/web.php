<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
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
        Route::get('/', [AuthenticationController::class, 'login'])->name('index');
        Route::get('/index', [AuthenticationController::class, 'login'])->name('index');
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('post/login', [AuthenticationController::class, 'postLogin'])->name('post.login');
    });
    
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:web', 'disableBackButton', 'admin'])->group(function(){
    Route::get('/umkm', [FrontController::class, 'umkm'])->name('umkm');
    Route::get('/product', [FrontController::class, 'product'])->name('product');
    
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('kategori', KategoriController::class);
        Route::resource('umkm', UMKMController::class);
    });
});
