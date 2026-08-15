<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index'])->name('cardapio');
Route::get('/cardapio', [MenuController::class, 'index'])->name('menu.index');
Route::redirect('/login', '/admin/login')->name('login');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware('auth')->group(function (): void {
        Route::redirect('/', '/admin/items')->name('home');
        Route::resource('items', MenuItemController::class)->except(['show']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
