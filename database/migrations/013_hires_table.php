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
        Schema::create('hires', function (Blueprint $table) {
            $table->id();
            $table->string('cbo', 100)->nullable();
            $table->string('codigo', 100)->nullable();
            $table->string('sigla', 100)->nullable();
            $table->text('objeto')->nullable();
            $table->tinyInteger('tipo')->nullable(); 
            $table->string('contrato', 100)->nullable();
            $table->string('contratante', 100)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->decimal('valor', 15, 2)->nullable();
            $table->tinyInteger('vigência')->nullable(); 
            $table->date('inicio')->nullable();
            $table->date('termino')->nullable();
            $table->tinyInteger('gestor')->nullable(); 
            $table->tinyInteger('auxiliar')->nullable(); 
            $table->tinyInteger('status')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hires');
    }
};
