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
        Schema::create('f_s_remplissages', function (Blueprint $table) {
            $table->id();
            // Workorder_id later -> relation table WorkOrder
            $table->string('work_order_id');
            $table->foreign('work_order_id')->references('id')->on('work_orders')->onDelete('cascade');//refrence on work order

            // lote number
            $table->string('lote_id');
            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade');//refrence on work lote
            
            $table->float('vitesse_traction');
            $table->float('vitesse_extrudeuse');
            $table->float('temp_sechage_pbt');
            $table->float('demontion_moule');

            // Fabriquant
            $table->string('fabriquant');
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
        Schema::dropIfExists('f_s_remplissages');
    }
};
