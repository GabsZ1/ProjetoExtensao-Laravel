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
        Schema::table('instituicaos', function (Blueprint $table) {
            $table->rememberToken(); // cria a coluna remember_token
        });
    }

    public function down()
    {
        Schema::table('instituicaos', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
};
