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
            $table->foreignId('grupo_id')->constrained()->onDelete('cascade');
            $table->foreignId('subgrupo_id')->constrained()->onDelete('cascade');
            $table->string('sinapi', 50)->nullable();
            $table->string('codigo', 50)->nullable();
            $table->text('descricao')->nullable();
            $table->text('referencia')->nullable();
            $table->string('unidade',50)->nullable();
            $table->decimal('valor', 9,2 )->nullable();
            $table->string('imagem', 255 )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
