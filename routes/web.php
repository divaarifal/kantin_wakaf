<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin As Admin;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController as UserAuthController;

// Auth Routes (User)
Route::get('register', [UserAuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserAuthController::class, 'register']);
Route::get('login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/about', function() {
    $content = \App\Models\Content::where('page', 'about')->get()->keyBy(function($item) {
        return $item->section . '_' . $item->key;
    });
    return view('about', compact('content'));
})->name('about');

Route::get('/contact', function() {
    $content = \App\Models\Content::where('page', 'contact')->get()->keyBy(function($item) {
        return $item->section . '_' . $item->key;
    });
    return view('contact', compact('content'));
})->name('contact');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/scan-qr', [App\Http\Controllers\ProfileController::class, 'scanQr'])->name('scan.qr'); // Simulation Endpoint
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menus', Admin\MenuController::class);
        Route::resource('galleries', Admin\GalleryController::class)->except(['edit', 'update']);
        
        // CMS Routes
        Route::get('pages/{page}', [Admin\PageController::class, 'index'])->name('pages.edit');
        Route::put('pages/{page}', [Admin\PageController::class, 'update'])->name('pages.update');
    });
});
