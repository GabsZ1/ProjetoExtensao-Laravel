<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Hash;

class InstituicaoSeeder extends Seeder
{
    public function run(): void
    {
        Instituicao::updateOrCreate(
            ['email' => 'contato@exemplo.com'],
            [
                'nome' => 'Instituição Exemplo',
                'cnpj' => '12.345.678/0001-99',
                'password' => Hash::make('12345678'), // senha criptografada
                'telefone' => '(11) 99999-9999',
                'descricao' => 'Instituição exemplo criada automaticamente pela seeder.',
                'endereco' => 'Rua das Flores, 123 - São Paulo/SP',
                'responsavel' => 'Maria da Silva',
            ]
        );
    }
}
