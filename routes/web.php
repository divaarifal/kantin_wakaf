<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin As Admin;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menus', Admin\MenuController::class);
        Route::resource('galleries', Admin\GalleryController::class)->except(['edit', 'update']);
        
        // CMS Routes
        Route::get('pages/{page}', [Admin\PageController::class, 'index'])->name('pages.edit');
        Route::put('pages/{page}', [Admin\PageController::class, 'update'])->name('pages.update');
    });
});
