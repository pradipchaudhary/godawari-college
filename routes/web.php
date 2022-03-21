<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Banner
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('add-banner');
    Route::post('/banner/create', [BannerController::class, 'store'])->name('add-banner');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('edit-banner');
    Route::put('/banner/edit/{id}', [BannerController::class, 'update'])->name('update-banner');
    Route::delete('/banner/edit/{id}', [BannerController::class, 'delete'])->name('delete-banner');
});
