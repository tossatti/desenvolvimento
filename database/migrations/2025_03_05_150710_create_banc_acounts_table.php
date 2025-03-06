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
        Schema::create('banc_acounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table-> string('banco', 50);
            $table-> string('agencia', 20);
            $table-> string('tipoconta', 20);
            $table-> string('numeroConta', 20);
            $table-> string('tipopix', 50);
            $table-> string('pix', 100);
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
