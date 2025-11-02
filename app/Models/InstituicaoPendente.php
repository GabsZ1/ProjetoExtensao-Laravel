<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituicaoPendente extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'password',
        'telefone',
        'descricao',
        'endereco',
        'responsavel',
    ];
}
