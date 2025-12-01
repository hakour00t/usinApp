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
            $table->enum('apparaille', ['1', '2']);
            $table->float('long');
            $table->float('vitesse');
            $table->enum('chifet', ['a', 'b' , 'c' , 'd']);
            $table->enum('color', [ 'blue' , 'orange' ,'vert' , 'marron' , 'gris' , 'blanc' , 'rouge' , 'noire' , 'jaune' , 'violet' , 'rose' , 'turquoise' ]);
            $table->boolean('colorQiolity');
            $table->boolean('bobineQiolity');
            $table->float('tempir');
            $table->float('debitAzot');
            $table->text('Observ')->nullable();
            $table->string('bobigneMere_id');
            $table->foreign('bobigneMere_id')->references('id')->on('bobines')->onDelete('cascade'); // refrence on bobine
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
        Schema::dropIfExists('fibre_coloris');
    }
};
