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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('email')->unique();
            $table->string('mot_de_passe');
            $table->foreignId('id_role')->references('id')->on('Roles');
            $table->foreignId('id_langue')->references('id')->on('langue');
            $table->date('date_naissance');
            $table->timestamp('date_inscription');
            $table->string('statut')-> default('en attente');
            $table->binary('photo')->nullable();
            $table->string('google2fa_secret')->nullable();
            $table->boolean('twofactor_enabled')->default(false);
            $table->timestamps();
        });
         DB::statement("ALTER TABLE utilisateurs ADD CONSTRAINT chk_sexe CHECK (sexe='M' or sexe='F');");
    }


          
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
