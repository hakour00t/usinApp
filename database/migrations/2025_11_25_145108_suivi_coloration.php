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
          Schema::create('suivColorations', function (Blueprint $table) {
            $table->id();
            $table->enum('apparaille', ['1', '2']);
            $table->float('vitesse');
            $table->enum('chifet', ['a', 'b' , 'c' , 'd']);
            $table->enum('color', [ 'blue' , 'orange' ,'vert' , 'marron' , 'gris' , 'blanc' , 'rouge' , 
            'noire' , 'jaune' , 'violet' , 'rose' , 'turquoise' ]);
            $table->boolean('colorQiolity');
            $table->boolean('bobineQiolity');
            $table->float('tempir');
            $table->float('debitAzot');
            $table->text('Observ');
           // $table->foreign('bobigneMere_id')->references('id')->on('bobignes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('users');
    }
};
