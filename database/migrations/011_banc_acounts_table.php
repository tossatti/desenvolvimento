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
        Schema::create('bank_acounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('banco', 50);
            $table->string('agencia', 20);
            $table->tinyInteger('tipo_conta', 2)->nullable();
            $table->string('numero_conta', 20)->unique(); // Se aplicável
            $table->tinyInteger('tipo_pix', 2)->nullable();
            $table->string('pix', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banc_acounts');
    }
};
