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
        Schema::create('personal_documents', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            $table->string('pis_pasep')->unique();
            $table->string('titulo_eleitor')->unique();
            $table->string('zona', 5);
            $table->string('secao', 5);
            $table->string('cnh')->unique();
            $table->tinyInteger('catcnh');
            $table->string('ctps');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_documents');
    }
};
