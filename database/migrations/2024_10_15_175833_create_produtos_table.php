<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->decimal('preco', 8, 2);
            $table->integer('quantidade_em_estoque');
            $table->boolean('status');
            $table->timestamps();

            /*
                Criacao da tabela produtos com base nas informacoes passadas.
                id (UUID),
                nome (string),
                descricao (text),
                preco (decimal),
                quantidade_em_estoque (integer),
                status (boolean, disponível/não disponível).
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
