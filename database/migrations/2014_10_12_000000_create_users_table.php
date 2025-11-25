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
        Schema::create('users', function (Blueprint $table) {
           $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('adress');
            $table->enum  ('grad' , [
                 'Soldat', 'Caporal', 'Caporal_chef', 'Sergent', 'Sergent_chef', 'Adjudant' ,'Adjudant_chef',
                 'Adjudant_principal' , 'Aspirant','Sous_lieutenant', 'Lieutenant', 'Capitaine',
                 'Commandant', 'Lieutenant_colonel' ,'Colonel']
        );
            $table->date('date');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
