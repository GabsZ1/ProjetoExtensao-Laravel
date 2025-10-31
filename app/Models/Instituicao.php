<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Instituicao extends Authenticatable

{
    protected $fillable = [ //pra permitir quais campos podem ser acessado pra nao dar erro de segurança
        'nome',
        'email',
        'cnpj',
        'telefone',
        'responsavel',
        'descricao',
        'endereco',
        'senha',
    ];

    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }

}
