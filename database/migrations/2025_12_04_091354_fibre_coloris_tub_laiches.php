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
                Schema::create('fibre_coloris_tube_laches', function (Blueprint $table) {
                $table->id();

                $table->string('tub_laiche_id')->foreignId('tub_laiche_id') ->constrained('tub_laiches')->onDelete('cascade');

                $table->string('fibre_colori_id')->foreignId('fibre_colori_id')->constrained('fibre_coloris')->onDelete('cascade');
                       

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
