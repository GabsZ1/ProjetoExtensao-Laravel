<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'instituicao_id',
        'nome_doador',
        'email_doador',
        'telefone_doador', // ✅ adicionado
        'valor',
        'tipo',
        'descricao',
        'data_doacao',
    ];


    // Relação com Instituicao
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }
}
