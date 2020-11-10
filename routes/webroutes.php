<?php

use Illuminate\Support\Facades\Route;
use Rainsens\Adm\Http\Controllers\MenusController;

Route::get('menus', [MenusController::class, 'index'])->name('menus.index');
Route::get('menus/{menu}', [MenusController::class, 'show'])->name('menus.show');
Route::post('menus', [MenusController::class, 'store'])->name('menus.store');
