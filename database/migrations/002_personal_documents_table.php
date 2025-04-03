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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cpf', 11)->unique();
            $table->string('pis_pasep', 11)->unique();
            $table->string('titulo_eleitor', 12)->unique();
            $table->string('zona', 5);
            $table->string('secao', 5);
            $table->string('cnh', 11)->unique();
            $table->tinyInteger('catcnh', 2)->nullable();
            $table->string('ctps', 20);
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
