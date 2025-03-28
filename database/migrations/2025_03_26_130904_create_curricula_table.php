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
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            // vaga
            $table->foreignId('role_id')->constrained();
            // dados pessoais
            $table->string('name')->unique(); // ok
            $table->string('endereco', 255); // ok
            $table->string('numero', 255); // ok
            $table->string('complemento', 255); // ok
            $table->string('bairro', 80); // ok
            $table->string('cidade', 80); // ok
            $table->tinyInteger('estado', 2); // ok
            $table->string('cep',8); // ok
            $table->string('telefone'); // ok
            $table->string('email')->unique(); // ok
            $table->date('nascimento'); // ok
            $table->string('naturalidade'); // ok
            $table->string('nacionalidade'); // ok
            $table->tinyInteger('genero'); // ok
            $table->tinyInteger('escolaridade'); // ok
            $table->tinyInteger('raca'); // ok
            $table->tinyInteger('civil'); // ok
            // documentos pessoais
            $table->string('cpf')->unique(); // ok
            $table->string('pis_pasep')->unique(); // ok
            $table->string('titulo_eleitor')->unique(); // ok
            $table->string('zona', 5); // ok
            $table->string('secao', 5); // ok
            $table->string('cnh')->unique(); // ok
            $table->tinyInteger('catcnh'); // ok
            $table->string('ctps')->unique(); // ok
            // dados bancários
            $table->string('banco', 50); // ok
            $table->string('agencia', 20); // ok
            $table->tinyInteger('tipoconta'); // ok
            $table->string('numeroConta', 20); // ok
            $table->tinyInteger('tipopix'); // ok
            $table->string('pix', 100); // ok
            // EPI
            $table->tinyInteger('calca'); // ok
            $table->tinyInteger('camisa'); // ok
            $table->tinyInteger('camisa'); // ok
            // capacitação
            $table->tinyInteger('nr10'); // ok
            // dependentes
            $table->tinyInteger('dependentes'); // ok
            $table->tinyInteger('numeroDependentes'); // ok
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
