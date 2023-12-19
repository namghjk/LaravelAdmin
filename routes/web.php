<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('admin/users/register', [RegisterController::class, 'index'])->name('register');
Route::post('admin/users/register/regist', [RegisterController::class, 'registerPost'])->name('regist');




Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
        });
    });
});
