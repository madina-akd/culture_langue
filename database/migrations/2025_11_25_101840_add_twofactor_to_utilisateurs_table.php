<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwofactorToUtilisateursTable extends Migration
{
    /**
     * Exécuter la migration.
     */
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            // Clé secrète générée par Google2FA
            $table->string('google2fa_secret')->nullable()->after('mot_de_passe');

            // Flag pour savoir si la 2FA est activée
            $table->boolean('twofactor_enabled')->default(false)->after('google2fa_secret');
        });
    }

    /**
     * Annuler la migration.
     */
    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn(['google2fa_secret', 'twofactor_enabled']);
        });
    }
}
