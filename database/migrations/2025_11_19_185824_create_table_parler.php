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
        Schema::create('parler', function (Blueprint $table) {
            
            $table->foreignId('id_region')->references('id_region')->on('région');
            $table->foreignId('id_langue')->references('id_langue')->on('langue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parler');
    }
};
