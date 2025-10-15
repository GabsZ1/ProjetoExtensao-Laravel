<?php

use App\Http\Controllers\InstituicaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return 'Chegou aqui';
});

// rotas das instituições

Route::get('/instituicoes', [InstituicaoController::class, 'index'])->name('instituicoes.index');
