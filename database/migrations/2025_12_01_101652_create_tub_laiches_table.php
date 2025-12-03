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
        Schema::create('tub_laiches', function (Blueprint $table) {
            $table->string('id')->primary();    // PRIMARY TEXT KEY

            $table->float('vitesse_traction')->default(70);
            $table->float('vitesse_extrudeuse')->default(8.5);

            $table->float('pourcentage_gel')->default(6);

            $table->float('noyau_moule');
            $table->float('couverture_moule_interieur');
            $table->float('couverture_moule_exterieur');

            $table->float('aiguille_fibre');
            $table->float('aiguille_gel');
            $table->float('temp_environnement');
            $table->float('temp_sechage_pbt');
             // Corps
            $table->float('corps1');
            $table->float('corps2');
            $table->float('corps3');
            $table->float('corps4');
            // Têtes
            $table->float('tete1');
            $table->float('tete2');
            $table->float('tete3');
             // Auges
            $table->float('auge_chaude');
            $table->float('auge_tiede');
            $table->float('auge_froide');
            
            // Couleurs
            $table->enum('color', [
                'blue', 'orange', 'verte', 'marron', 'grise', 'blanc',
                'rouge', 'noire', 'jaune', 'violet', 'rose', 'turquise'
            ]);

            $table->float('longueur');

            // Lots
            $table->string('pbt_lote')->default('4/9');
            $table->string('gel_lote')->default('3/9');
            // chift
            $table->enum('chifet', ['a', 'b' , 'c' , 'd']);
            // User relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//refrence on user auther
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tub_laiches');
    }
};
