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
        Schema::create('f_scoloratios', function (Blueprint $table) {
            $table->id(); // number of file
            //date of created_at is the date of file

            // Workorder_id later -> relation table WorkOrder
            $table->string('work_order_id');
            // $table->foreign('work_order_id')->references('id')->on('work_order')->onDelete('cascade');//refrence on work order

            // lote number
            $table->string('lote_id');
            // $table->foreign('lote_id')->references('id')->on('lote')->onDelete('cascade');//refrence on work lote

            $table->enum('apariel', ['1', '2']);// machine number (apariel 1 / 2)
            $table->decimal('vitesse');// coloration speed (vitess de coloration)
            // fornissuer from => list des fournissuers
            $table->string('fornissuer_id');
            // $table->foreign('fornissuer_id')->references('id')->on('fornissuer')->onDelete('cascade');//refrence on work fornissuer

            $table->enum('chifet', ['a', 'b' , 'c' , 'd']);// shift a/b/c/d

          
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
        Schema::dropIfExists('f_scoloratios');
    }
};
