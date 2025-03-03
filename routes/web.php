<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// rotas públicas
Route::get('/', [PublicController::class, 'index'])->name('public.index');

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

// rotas privadas
Route::group(['middleware' => 'auth'], function () {
    //logout
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
    // rotas de usuários
    Route::get('/index-user', [UserController::class, 'index'])->name('users.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});
