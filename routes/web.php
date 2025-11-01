<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\InstituicaoPendenteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // sua view pública
});

//Rota que envia o cadastro da instituicao
Route::post('/instituicoes_pendentes', [InstituicaoPendenteController::class, 'store'])->name('instituicoes_pendentes.store');

// rotas das instituições
Route::get('/instituicoes', [InstituicaoController::class, 'index'])->name('instituicoes.index');
Route::post('/instituicoes', [InstituicaoController::class, 'store'])->name('instituicoes.store');

//Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rotas das doações
Route::resource('doacoes', DoacaoController::class);
