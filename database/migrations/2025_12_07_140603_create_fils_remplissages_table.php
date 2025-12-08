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
        Schema::create('fils_remplissages', function (Blueprint $table) {
            $table->string('id')->primary();    // PRIMARY TEXT KEY
            // //coluer
            $table->enum('couleur', [ 'blue' , 'orange' ,'vert' , 'marron' , 'gris' , 'blanc' , 'rouge' , 'noire' , 'jaune' , 'violet' , 'rose' , 'turquoise' ]);
            // longueur
            $table->float('longueur');
            // observation 
            $table->longText('observation')->nullable()->default('');
            // relation fiche de suivi de production de fils de remplissage .
            $table->unsignedBigInteger('f_s_remplissages_id');
            $table->foreign('f_s_remplissages_id')->references('id')->on('f_s_remplissages')->onDelete('cascade');//refrence on f_s_remplissages
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fils_remplissages');
    }
};
