<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);


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

    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('add-testimonial');
    Route::post('/testimonial/create', [TestimonialController::class, 'store'])->name('add-testimonial');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('edit-testimonial');
    Route::put('/testimonial/edit/{id}', [TestimonialController::class, 'update'])->name('update-testimonial');
    Route::delete('/testimonial/edit/{id}', [TestimonialController::class, 'delete'])->name('delete-testimonial');
});
