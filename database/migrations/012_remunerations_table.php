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
        Schema::create('remunerations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->decimal('salario_base', 9, 2); // Mais descritivo
            $table->decimal('inss', 6, 4); // Percentual
            $table->decimal('periculosidade', 6, 4); // Percentual
            $table->decimal('alimentacao', 9, 2)->nullable();
            $table->decimal('transporte', 9, 2)->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remunerations');
    }
};
