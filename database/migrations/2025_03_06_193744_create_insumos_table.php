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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->constrained();
            $table->foreignId('subgrupo_id')->constrained();
            $table->string('codigo', 50)->nullable();
            $table->string('sinapi', 50)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->string('referencia', 100)->nullable();
            $table->string('unidade', 20)->nullable();
            $table->decimal('valor', 9, 2)->nullable();
            $table->string('imagem', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
