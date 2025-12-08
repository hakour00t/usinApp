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
        Schema::create('f_s_revetement_secs', function (Blueprint $table) {
            $table->id(); // numéro de fiche
            //create_at la dete de fiche

            // Workorder_id later -> relation table WorkOrder
            $table->string('work_order_id');
            // $table->foreign('work_order_id')->references('id')->on('work_order')->onDelete('cascade');//refrence on work order

            // lote number
            $table->string('lote_id');
            // $table->foreign('lote_id')->references('id')->on('lote')->onDelete('cascade');//refrence on work lote

            $table->float('vitesse_traction');//
            $table->float('vitesse_extrudeuse');//
            $table->float('pourcentage_gel');
            $table->float('noyau_moule');
            $table->float('couverture_moule_interieur');
            $table->float('couverture_moule_exterieur');
            $table->float('aiguille_fibre');
            $table->float('aiguille_gel');
            $table->float('temp_environnement');
            $table->float('temp_sechage_pbt');//

            // Température de extrédeuse
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
            // fabriquant
            $table->string('fabriquant');
            // Lots
            $table->string('pbt_lote');
            $table->string('gel_lote');
            // chift
            $table->enum('chifet', ['a', 'b' , 'c' , 'd']);
            // User relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//refrence on user auther

            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('f_s_revetement_secs');
    }
};
