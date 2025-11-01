<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoacaoController;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return 'Chegou aqui';
});

// rotas das instituições

Route::get('/instituicoes', [InstituicaoController::class, 'index'])->name('instituicoes.index');
Route::post('/instituicoes', [InstituicaoController::class, 'store'])->name('instituicoes.store');

Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rotas das doações

Route::resource('doacoes', DoacaoController::class);
