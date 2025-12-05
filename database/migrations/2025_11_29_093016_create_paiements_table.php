<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('contenu_id')->constrained('contenu')->onDelete('cascade');
            $table->string('type_contenu'); // histoire, recette, tradition
            $table->decimal('montant', 10, 2);
            $table->string('statut')->default('en_attente'); // en_attente, paye, echoue
            $table->string('email_lecteur')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('donnees_paiement')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};