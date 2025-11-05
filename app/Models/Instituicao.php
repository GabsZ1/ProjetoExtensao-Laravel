<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Instituicao extends Authenticatable

{

    protected $table = 'instituicaos';

    protected $fillable = [ //pra permitir quais campos podem ser acessado pra nao dar erro de segurança
        'nome',
        'email',
        'cnpj',
        'password',
        'telefone',
        'responsavel',
        'descricao',
        'endereco',
    ];

    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }

}
