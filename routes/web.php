<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\InstituicaoPendenteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rota que envia o cadastro da instituicao
Route::post('/instituicoes_pendentes', [InstituicaoPendenteController::class, 'store'])->name('instituicoes_pendentes.store');

// rotas das instituições

Route::middleware(['auth:instituicao', 'isInstituicao'])->group(function () {
    Route::get('/instituicoes', [InstituicaoController::class, 'index'])->name('instituicoes.index');
});

Route::post('/instituicoes', [InstituicaoController::class, 'store'])->name('instituicoes.store');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rotas das doações
Route::resource('doacoes', DoacaoController::class);

Route::middleware(['auth:web', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Admin - Instituições
Route::get('/admin/instituicoes', [AdminController::class, 'instituicoesPendentes'])->name('admin.instituicoes');     // Lista instituições pendentes
Route::post('/admin/instituicoes/aprovar/{id}', [AdminController::class, 'aprovar'])->name('admin.instituicoes.aprovar');  // Aprovar instituição
Route::delete('/admin/instituicoes/rejeitar/{id}', [AdminController::class, 'rejeitar'])->name('admin.instituicoes.rejeitar');

// Admin - Instituições Aprovadas
Route::get('/admin/instituicoes/aprovadas', [AdminController::class, 'instituicoesAprovadas'])->name('admin.instituicoes.aprovadas');
Route::get('/admin/instituicoes/editar/{id}', [AdminController::class, 'editar'])->name('admin.instituicoes.editar');
Route::put('/admin/instituicoes/atualizar/{id}', [AdminController::class, 'atualizar'])->name('admin.instituicoes.atualizar');
Route::delete('/admin/instituicoes/deletar/{id}', [AdminController::class, 'deletar'])->name('admin.instituicoes.deletar');
