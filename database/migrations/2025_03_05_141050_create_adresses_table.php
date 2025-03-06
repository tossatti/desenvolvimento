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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table-> string('endereco', 255);
            $table-> string('numero', 255);
            $table-> string('complemento', 255);
            $table-> string('bairro', 80);
            $table-> string('cidade', 80);
            $table-> string('estado', 2);
            $table-> string('cep',8);
            $table-> string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
