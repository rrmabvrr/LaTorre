<?php

use App\Http\Controllers\PublicMenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicMenuController::class, 'home'])->name('home');
Route::get('/cardapio', [PublicMenuController::class, 'menu'])->name('menu.index');
