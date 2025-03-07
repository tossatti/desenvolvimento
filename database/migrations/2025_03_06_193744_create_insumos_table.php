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
            $table->string('grupo', 50);
            $table->string('subgrupo', 50);
            $table->string('codigo', 50);
            $table->string('sinapi', 50);
            $table->string('descricao', 100);
            $table->string('referencia', 100);
            $table->string('unidade', 20);
            $table->decimal('valor', 9, 2);
            $table->string('imagem', 255);
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
