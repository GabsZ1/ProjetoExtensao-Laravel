<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;

class Instituicao extends Authenticatable
{
    use Notifiable, CanResetPassword;

    protected $table = 'instituicaos';

    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'password',
        'telefone',
        'responsavel',
        'descricao',
        'endereco',
        'is_active',
    ];

    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }

        public function getRememberTokenName()
    {
        return null;
    }
}
