<?php

use App\Http\Controllers\{UserController, PublicController, LoginController, AlmoxarifadoController, GrupoInsumoController, InsumoController, MekaController, SubgrupoInsumoController};
use Illuminate\Support\Facades\Route;

// rotas públicas
Route::get('/', [PublicController::class, 'index'])->name('public.index');

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

/**
 * rotas privadas
 */
Route::group(['middleware' => 'auth'], function () {
    //logout
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
    
    // início
    Route::get('/meka', [MekaController::class, 'index'])->name('meka.index');


    // Colaboradores
    Route::get('/index-user', [UserController::class, 'index'])->name('users.index');
    Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('users.store');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Almoxarifado
    Route::get('/almoxarifado', [AlmoxarifadoController::class, 'index'])->name('almoxarifado.index');
    
    // insumos
    Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');
    Route::get('/create-insumos', [InsumoController::class, 'create'])->name('insumos.create');
    Route::post('/store-insumos', [InsumoController::class, 'store'])->name('insumos.store');
    Route::get('/edit-insumos/{insumo}', [InsumoController::class, 'edit'])->name('insumos.edit');
    Route::get('/show-insumos/{insumo}', [InsumoController::class, 'show'])->name('insumos.show');
    Route::put('/update-insumos/{insumo}', [InsumoController::class, 'update'])->name('insumos.update');
    Route::delete('/destroy-insumos/{insumo}', [InsumoController::class, 'destroy'])->name('insumos.destroy');
    
    
    // grupo de insumos
    Route::get('/grupoinsumos', [GrupoInsumoController::class, 'index'])->name('grupoInsumo.index');
    Route::get('/create-grupoinsumos', [GrupoInsumoController::class, 'create'])->name('grupoInsumo.create');
    Route::post('/store-grupoinsumos', [GrupoInsumoController::class, 'store'])->name('grupoInsumo.store');
    Route::get('/edit-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'edit'])->name('grupoInsumo.edit');
    Route::put('/update-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'update'])->name('grupoInsumo.update');
    Route::delete('/destroy-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'destroy'])->name('grupoInsumo.destroy');
    
    // subgrupo de insumos
    Route::get('/subgrupoinsumos', [SubgrupoInsumoController::class, 'index'])->name('subgrupoInsumo.index');
    Route::get('/create-subgrupoinsumos', [SubgrupoInsumoController::class, 'create'])->name('subgrupoInsumo.create');
    Route::post('/store-subgrupoinsumos', [SubgrupoInsumoController::class, 'store'])->name('subgrupoInsumo.store');
    Route::get('/edit-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'edit'])->name('subgrupoInsumo.edit');
    Route::put('/update-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'update'])->name('subgrupoInsumo.update');
    Route::delete('/destroy-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'destroy'])->name('subgrupoInsumo.destroy');


    

});
