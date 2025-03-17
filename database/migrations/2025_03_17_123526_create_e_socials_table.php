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
            $table->foreignId('user_id')->constrained();
            $table-> string('matricula', 50);
            $table-> string('nocivos', 50);
            $table-> string('admissionais', 50);
            $table-> string('periodicos', 50);
            $table-> string('mudanca', 50);
            $table-> string('retorno', 50);
            $table-> string('demissional', 50);
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
