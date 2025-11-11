<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\InstituicaoPendenteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\Auth\InstituicaoForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\InstituicaoResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

// Cadastro de instituição pendente
Route::post('/instituicoes_pendentes', [InstituicaoPendenteController::class, 'store'])
    ->name('instituicoes_pendentes.store');

/*
|--------------------------------------------------------------------------
| Rotas de Esqueci Minha Senha para INSTITUIÇÃO
|--------------------------------------------------------------------------
*/
// Mostrar formulário "esqueci minha senha"
Route::get('/instituicao/password/forgot', [InstituicaoForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('instituicao.password.request');

// Enviar email com link de reset
Route::post('/instituicao/password/email', [InstituicaoForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('instituicao.password.email');

// Tela para redefinir senha (com token)
Route::get('/instituicao/password/reset/{token}', [InstituicaoResetPasswordController::class, 'showResetForm'])
    ->name('instituicao.password.reset');

// Atualizar senha
Route::post('/instituicao/password/reset', [InstituicaoResetPasswordController::class, 'reset'])
    ->name('instituicao.password.update');

/*
|--------------------------------------------------------------------------
| Rotas de Instituições (logadas com guard instituicao)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:instituicao', 'isInstituicao'])->group(function () {

    // Dashboard da instituição
    Route::get('/instituicoes', [InstituicaoController::class, 'dashboard'])
        ->name('instituicoes.index');

    // Listar todas as doações da instituição
    Route::get('/doacoes', [DoacaoController::class, 'index'])
        ->name('doacoes.index');

    // Formulário para criar nova doação
    Route::get('/doacoes/criar', [DoacaoController::class, 'create'])
        ->name('doacoes.create');

    // Salvar nova doação
    Route::post('/doacoes', [DoacaoController::class, 'store'])
        ->name('doacoes.store');

    // Formulário para editar doação existente
    Route::get('/doacoes/{id}/editar', [DoacaoController::class, 'edit'])
        ->name('doacoes.edit');

    // Atualizar doação existente
    Route::put('/doacoes/{id}', [DoacaoController::class, 'update'])
        ->name('doacoes.update');

    // Excluir doação
    Route::delete('/doacoes/{id}', [DoacaoController::class, 'destroy'])
        ->name('doacoes.destroy');
});


/*
|--------------------------------------------------------------------------
| Rotas de Doações
|--------------------------------------------------------------------------
*/
Route::resource('doacoes', DoacaoController::class);

/*
|--------------------------------------------------------------------------
| Rotas do Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web', 'is_admin'])->group(function () {

    // Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    /*
    |----------------------------------------------------------
    | Instituições Pendentes
    |----------------------------------------------------------
    */
    Route::get('/admin/instituicoes', [AdminController::class, 'instituicoesPendentes'])
        ->name('admin.instituicoes');

    Route::post('/admin/instituicoes/aprovar/{id}', [AdminController::class, 'aprovar'])
        ->name('admin.instituicoes.aprovar');

    Route::delete('/admin/instituicoes/rejeitar/{id}', [AdminController::class, 'rejeitar'])
        ->name('admin.instituicoes.rejeitar');

    /*
    |----------------------------------------------------------
    | Instituições Aprovadas
    |----------------------------------------------------------
    */
    Route::get('/admin/instituicoes/aprovadas', [AdminController::class, 'instituicoesAprovadas'])
        ->name('admin.instituicoes.aprovadas');

    Route::get('/admin/instituicoes/editar/{id}', [AdminController::class, 'editar'])
        ->name('admin.instituicoes.editar');

    Route::put('/admin/instituicoes/atualizar/{id}', [AdminController::class, 'atualizar'])
        ->name('admin.instituicoes.atualizar');

    /*
    |----------------------------------------------------------
    | Ativar / Desativar Instituição
    |----------------------------------------------------------
    */
    Route::put('/admin/instituicoes/{id}/desativar', [AdminController::class, 'desativar'])
        ->name('admin.instituicoes.desativar');

    Route::put('/admin/instituicoes/{id}/ativar', [AdminController::class, 'ativar'])
        ->name('admin.instituicoes.ativar');
});
    
/*
|--------------------------------------------------------------------------
| Rota de Autenticação (Admin/Instituição)
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

// Rota de Log Out de Instituição
Route::post('/instituicao/logout', [LoginController::class, 'logoutInstituicao'])->name('instituicao.logout');
