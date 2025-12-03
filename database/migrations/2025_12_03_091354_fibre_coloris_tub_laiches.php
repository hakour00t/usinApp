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
        Schema::create('fibre_colori_tub_laiche', function (Blueprint $table) {
            $table->id();
            
            $table->string('fibre_coloris_id');
            $table->foreign('fibre_coloris_id')->references('id')->on('fibre_coloris')->onDelete('cascade');//refrence on fibre colorier
           
            $table->string('tub_laiche_id');
            $table->foreign('tub_laiche_id')->references('id')->on('tub_laiches')->onDelete('cascade');//refrence on fibre tube lache
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fibre_colori_tub_laiche');
    }
};
