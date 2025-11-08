<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Relacionamento com a instituição
            $table->foreignId('instituicao_id')->constrained('instituicaos')->onDelete('cascade');

            // Campos da doação
            $table->string('nome_doador');
            $table->string('email_doador')->nullable();
            $table->string('telefone_doador')->nullable();
            $table->decimal('valor', 10, 2)->nullable(); // caso a doação seja em dinheiro
            $table->text('descricao')->nullable();
            $table->date('data_doacao')->nullable();
            $table->enum('tipo', [
                'dinheiro',
                'alimento',
                'roupa',
                'brinquedo',
                'higiene',
                'eletronico',
                'moveis',
                'medicamentos',
                'produtos_limpeza',
                'equipamentos'
            ])->default('dinheiro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doacaos');
    }
};
