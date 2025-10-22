<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



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


}
