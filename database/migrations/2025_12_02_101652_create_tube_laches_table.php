<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tube_laches', function (Blueprint $table) {
            $table->string('id')->primary();    // PRIMARY TEXT KEY

            // type de fibre
            $table->string('type_fibre_id');
            // $table->foreign('type_fibre_id')->references('id')->on('type_fibre')->onDelete('cascade');//refrence on work type de fibre

            // Couleurs
            $table->enum('couleur', [ 'blue', 'orange', 'verte', 'marron', 'grise', 'blanc', 'rouge', 'noire', 'jaune', 'violet', 'rose', 'turquise']);

            $table->float('longueur');

            // User relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//refrence on user auther
           
            // relation fiche de suivi de production revetement secandaire
            $table->unsignedBigInteger('f_s_revetement_secs_id');
            $table->foreign('f_s_revetement_secs_id')->references('id')->on('f_s_revetement_secs')->onDelete('cascade');//refrence on f_s_revetement_secs
           
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tube_laches');
    }
};
