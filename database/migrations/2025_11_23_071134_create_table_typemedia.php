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
       Schema::create('TypeMedia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->unique();
            $table->double('prix');
            $table->timestamps(); // adds created_at and updated_at

             
            
        });
        DB::statement("ALTER TABLE TypeMedia ADD CONSTRAINT chk_prix CHECK (prix <=5000);");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TypeMedia');
    }
};
