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
        Schema::create('fibre_coloris', function (Blueprint $table) {
            $table->string('id')->primary();    // PRIMARY TEXT KEY
            // //coluer
            $table->enum('couleur', [ 'blue' , 'orange' ,'vert' , 'marron' , 'gris' , 'blanc' , 'rouge' , 'noire' , 'jaune' , 'violet' , 'rose' , 'turquoise' ]);
            // longueur
            $table->float('longueur');
            // qualité 
            $table->boolean('colorQiolity');
            $table->boolean('bobineQiolity');
            // température de moule 
            $table->float('tempirature');
            // débit de azote
            $table->float('debitAzot');
            // refrence on bobine
            $table->string('bobigneMere_id');
            $table->foreign('bobigneMere_id')->references('id')->on('bobines')->onDelete('cascade'); // 
            // observation
            $table->text('observation')->nullable();
            // relation on fiche de suivi de coloratios
            $table->unsignedBigInteger('fs_coloratios_id');
            $table->foreign('fs_coloratios_id')->references('id')->on('fs_coloratios')->onDelete('cascade');//
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fibre_coloris');
    }
};
