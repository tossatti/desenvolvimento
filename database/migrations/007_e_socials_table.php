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
        Schema::create('e_socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table-> string('matricula', 50);
            $table-> date('nocivos')->nullable();
            $table-> date('admissionais')->nullable();
            $table-> date('periodicos')->nullable();
            $table-> date('mudanca')->nullable();
            $table-> date('retorno')->nullable();
            $table-> date('demissional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_socials');
    }
};
