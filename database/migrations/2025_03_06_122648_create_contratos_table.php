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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table-> string('tipoContrato', 50);
            $table-> string('lotacao', 50);
            $table-> string('equipe', 50);
            $table-> string('funcao', 50);
            $table-> decimal('remuneracao', 9, 2);
            $table-> string('cbo', 50);
            $table-> string('situacao', 50);
            $table-> string('disponibilidade', 50);
            $table-> date('aso', 50);
            $table-> date('admissao', 50);
            $table-> date('termino', 50);
            $table-> string('observacao', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
