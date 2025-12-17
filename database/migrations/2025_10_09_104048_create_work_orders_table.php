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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->string('id')->primary();    // PRIMARY TEXT KEY
            $table->longText('description');
            $table->date('date_creation');
            $table->date('date_debut');
            $table->date('date_cloture')->nullable();
            $table->decimal('quantite_planifiee');
            $table->date('date_de_finaliser')->nullable();
            $table->string('lote_id')->foreignId('lote_id') ->constrained('lotes')->onDelete('cascade');
            // User relation
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
