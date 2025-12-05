<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commentaire', function (Blueprint $table) {
            $table->increments('id');
            $table->text('texte');
            $table->double('note');
            $table->date('date');
            
            $table->foreignId('id_utilisateur')->references('id')->on('utilisateurs');
            $table->foreignId('id_contenu')->references('id')->on('contenu');
            $table->timestamps();
        });
         DB::statement("ALTER TABLE commentaire ADD CONSTRAINT chk_note CHECK (note between 0 and 5 );");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaire');
    }
};
