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
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            // dados pessoais
            $table->string('name')->unique();
            $table->string('endereco', 255);
            $table->string('numero', 255);
            $table->string('complemento', 255);
            $table->string('bairro', 80);
            $table->string('cidade', 80);
            $table-> tinyInteger('estado')->nullable();
            $table->string('cep', 8);
            $table->string('telefone', 20);
            $table->string('email')->unique();
            $table->date('nascimento');
            $table->string('naturalidade');
            $table->string('nacionalidade');
            $table->tinyInteger('genero');
            $table->tinyInteger('escolaridade');
            $table->tinyInteger('raca');
            $table->tinyInteger('civil');
            // documentos pessoais
            $table->string('cpf', 11)->unique();
            $table->string('pis_pasep', 11)->unique();
            $table->string('titulo_eleitor', 12)->unique();
            $table->string('zona', 5);
            $table->string('secao', 5);
            $table->string('cnh', 11)->unique();
            $table->tinyInteger('catcnh')->nullable();
            $table->string('ctps', 20);
            // dados bancários
            $table->string('banco', 50);
            $table->string('agencia', 20);
            $table->tinyInteger('tipoconta', 2 )->nullable();
            $table->string('numeroConta', 20);
            $table->tinyInteger('tipopix', 2)->nullable();
            $table->string('pix', 100); // ou text
            // EPI
            $table->tinyInteger('calca', 2)->nullable();
            $table->tinyInteger('camisa', 2)->nullable();
            $table->tinyInteger('calcado', 2)->nullable();
            // capacitação
            $table->tinyInteger('nr10', 2)->nullable();
            // dependentes
            $table->tinyInteger('dependentes', 2)->nullable();
            $table->tinyInteger('numeroDependentes', 2)->nullable();
            // experiencia
            $table->tinyInteger('anterior', 2)->nullable();
            $table->string('funcao_anterior', 100);
            $table->string('empresa', 100);
            $table->date('periodo_inicio');
            $table->date('periodo_termino');
            $table->tinyInteger('carteira', 2)->nullable();
            $table->tinyInteger('indicacao', 2)->nullable();
            $table->string('quem', 255);
            $table->tinyInteger('status', 2)->nullable();
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
