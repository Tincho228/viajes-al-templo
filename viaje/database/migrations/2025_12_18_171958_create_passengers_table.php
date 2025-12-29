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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();

            // Basic information
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');

            //Identification
            $table->string('dni')->nullable()->unique();

            //Church information
            $table->boolean('is_member');
            $table->string('membership')->nullable();
            $table->boolean('is_endowed')->nullable();

            //Profile and Age
            $table->enum('gender', ['Hombre', 'Mujer']);
            $table->date('birthdate');

            // Children and youth authorization
            $table->boolean('is_authorized')->nullable();

            // Relations to wards table
            $table->foreignId('ward_id')
                ->constrained()
                ->onDelete('cascade');

            // Relations to users table
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
