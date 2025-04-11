<?php

use App\Http\Controllers\{UserController, PublicController, LoginController, AlmoxarifadoController, CurriculumController, GrupoInsumoController, HireController, InsumoController, MekaController, RemunerationController, RoleController, SignatureController, SubgrupoInsumoController};
use Illuminate\Support\Facades\Route;

/**
 * rotas públicas
 */
// página inicial
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/quemsomos', [PublicController::class, 'quemsomos'])->name('public.quemsomos');
Route::get('/servicos', [PublicController::class, 'servicos'])->name('public.servicos');
Route::get('/projetos', [PublicController::class, 'projetos'])->name('public.projetos');
Route::get('/contatos', [PublicController::class, 'contatos'])->name('public.contatos');
Route::get('/curriculum', [CurriculumController::class, 'create'])->name('curricula.create');
Route::post('/store-curriculum', [CurriculumController::class, 'store'])->name('curricula.store');
Route::get('/mensagem-curriculum', [CurriculumController::class, 'message'])->name('curricula.message');
//assinatura
Route::post('/assinar-documento-externo', [SignatureController::class, 'signExternDocument']);

// // login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/login/reset', [LoginController::class, 'reset'])->name('login.reset');
Route::post('/login/reset', [LoginController::class, 'solicitarReset'])->name('password.email');
Route::get('/login/senha/{token}', [LoginController::class, 'senha'])->name('login.senha');
Route::post('/login/senha', [LoginController::class, 'updateSenha'])->name('password.update');

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
    Route::get('/import-user', [UserController::class, 'import'])->name('users.import');
    Route::post('/importdata-user', [UserController::class, 'importdata'])->name('users.importdata');
    Route::post('/importdocdata-user', [UserController::class, 'importdocdata'])->name('users.importdocdata');
    Route::post('/importbancdata-user', [UserController::class, 'importbancdata'])->name('users.importbancdata');
    Route::post('/importadressdata-user', [UserController::class, 'importadressdata'])->name('users.importadressdata');
    Route::post('/importcontratosdata-user', [UserController::class, 'importcontratosdata'])->name('users.importcontratosdata');
    Route::post('/importesocialdata-user', [UserController::class, 'importesocialdata'])->name('users.importesocialdata');
    Route::get('/search-user', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{user}/document', [UserController::class, 'showDocument'])->name('users.document');
    Route::get('/users/{user}/pdf', [UserController::class, 'generatePdf'])->name('users.pdf');
    Route::post('/assinar-documento', [SignatureController::class, 'assinarDocumento'])->name('assinar.documento');
    

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
    Route::get('/import-insumo', [InsumoController::class, 'import'])->name('insumo.import');
    Route::post('/importinsumo-insumo', [InsumoController::class, 'importinsumo'])->name('insumo.importinsumo');
    Route::get('/insumos-search', [InsumoController::class, 'search'])->name('insumos.search');


    // grupo de insumos
    Route::get('/grupoinsumos', [GrupoInsumoController::class, 'index'])->name('grupoInsumo.index');
    Route::get('/create-grupoinsumos', [GrupoInsumoController::class, 'create'])->name('grupoInsumo.create');
    Route::post('/store-grupoinsumos', [GrupoInsumoController::class, 'store'])->name('grupoInsumo.store');
    Route::get('/edit-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'edit'])->name('grupoInsumo.edit');
    Route::put('/update-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'update'])->name('grupoInsumo.update');
    Route::delete('/destroy-grupoinsumos/{grupoInsumo}', [GrupoInsumoController::class, 'destroy'])->name('grupoInsumo.destroy');
    Route::get('/search-grupoinsumos', [GrupoInsumoController::class, 'search'])->name('grupoinsumo.search');

    // subgrupo de insumos
    Route::get('/subgrupoinsumos', [SubgrupoInsumoController::class, 'index'])->name('subgrupoInsumo.index');
    Route::get('/create-subgrupoinsumos', [SubgrupoInsumoController::class, 'create'])->name('subgrupoInsumo.create');
    Route::post('/store-subgrupoinsumos', [SubgrupoInsumoController::class, 'store'])->name('subgrupoInsumo.store');
    Route::get('/edit-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'edit'])->name('subgrupoInsumo.edit');
    Route::put('/update-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'update'])->name('subgrupoInsumo.update');
    Route::delete('/destroy-subgrupoinsumos/{subgrupoInsumo}', [SubgrupoInsumoController::class, 'destroy'])->name('subgrupoInsumo.destroy');
    Route::get('/search-subgrupoinsumos', [SubgrupoInsumoController::class, 'search'])->name('subgrupoinsumos.search');

    // funções
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create-roles', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/store-roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit-roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/update-roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/destroy-roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/search-roles', [RoleController::class, 'search'])->name('roles.search');

    // remunerações
    Route::get('/remunerations', [RemunerationController::class, 'index'])->name('remuneration.index');
    Route::get('/create-remunerations', [RemunerationController::class, 'create'])->name('remuneration.create');
    Route::post('/store-remunerations', [RemunerationController::class, 'store'])->name('remuneration.store');
    Route::get('/edit-remunerations/{remuneration}', [RemunerationController::class, 'edit'])->name('remuneration.edit');
    Route::put('/update-remunerations/{remuneration}', [RemunerationController::class, 'update'])->name('remuneration.update');
    Route::get('/remunerations/{remuneration}', [RemunerationController::class, 'show'])->name('remuneration.show');
    Route::delete('/destroy-remunerations/{remuneration}', [RemunerationController::class, 'destroy'])->name('remuneration.destroy');
    Route::get('/search-remunerations', [RemunerationController::class, 'search'])->name('remuneration.search');
    Route::get('/import-remuneration', [RemunerationController::class, 'import'])->name('remuneration.import');
    Route::post('/importremuneration-remuneration', [RemunerationController::class, 'importremuneration'])->name('remuneration.importremuneration');

    // hires (contratos de obras)
    Route::get('/hires', [HireController::class, 'index'])->name('hires.index');
    Route::get('/create-ss', [HireController::class, 'create'])->name('hires.create');
    Route::post('/store-hires', [HireController::class, 'store'])->name('hires.store');
    Route::get('/show-hire/{hire}', [HireController::class, 'show'])->name('hires.show');
    Route::get('/edit-hires/{hire}', [HireController::class, 'edit'])->name('hires.edit');
    Route::put('/update-hires/{hire}', [HireController::class, 'update'])->name('hires.update');
    Route::delete('/destroy-hires/{hire}', [HireController::class, 'destroy'])->name('hires.destroy');
    Route::get('/search-hires', [HireController::class, 'search'])->name('hires.search');
    Route::get('/import-hire', [HireController::class, 'import'])->name('hires.import');
    Route::post('/importhire-hire', [HireController::class, 'importhire'])->name('hires.importhire');
    Route::get('/hires/{hire}/document', [HireController::class, 'showDocument'])->name('hires.document');
    Route::get('/hires/{hire}/pdf', [HireController::class, 'generatePdf'])->name('hires.pdf');

    //currículos
    Route::get('/curricula', [CurriculumController::class, 'index'])->name('curricula.index');
    Route::get('/show-curricula/{curriculum}', [CurriculumController::class, 'show'])->name('curricula.show');
    Route::get('/edit-curricula/{curriculum}', [CurriculumController::class, 'edit'])->name('curricula.edit');
    Route::put('/update-curricula/{curriculum}', [CurriculumController::class, 'update'])->name('curricula.update');
    Route::delete('/destroy-curricula/{curriculum}', [CurriculumController::class, 'destroy'])->name('curricula.destroy');
    Route::get('/search-curricula', [CurriculumController::class, 'search'])->name('curricula.search');
    Route::get('/curricula/{curriculum}/document', [CurriculumController::class, 'showDocument'])->name('curricula.document');
    Route::get('/curricula/{curriculum}/pdf', [CurriculumController::class, 'generatePdf'])->name('curricula.pdf');
});
