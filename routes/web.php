<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/login', [ProfilesController::class, 'login'])->name('login');
Route::get('/register', [ProfilesController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/homepage', [FeedsController::class, 'index'])->name('homepage');
    Route::get('/profile', [ProfilesController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfilesController::class, 'editProfile'])->name('profile-edit');
    Route::put('/profile', [ProfilesController::class, 'updateProfile'])->name('profile-update'); 
    Route::put('/profile-image', [ProfilesController::class, 'updateProfileImg'])->name('profile-image-update');

    Route::get('/feeds/create', [FeedsController::class, 'create'])->name('feed-add');
    Route::post('/feeds', [FeedsController::class, 'store'])->name('feed-store');

    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive-index');
    Route::get('/archive/export/pdf', [ArchiveController::class, 'exportPDF'])->name('archive.exportPDF');
});






