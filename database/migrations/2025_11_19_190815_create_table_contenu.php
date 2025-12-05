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
        Schema::create('contenu', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titre');
            $table->text('texte');
            $table->foreignId('parent_id');
            $table->foreignId('id_type')->references('id')->on('TypeContenu');
            $table->foreignId('id_region')->references('id')->on('région');
            $table->foreignId('id_langue')->references('id')->on('langue');
            $table->foreignId('id_auteur')->references('id')->on('utilisateurs');
            $table->foreignId('id_moderateur')->references('id')->on('utilisateurs');
            $table->dateTime('date_validation');
            
            $table->string('statut')-> default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenu');
    }
};
