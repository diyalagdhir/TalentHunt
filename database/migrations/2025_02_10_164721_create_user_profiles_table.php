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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('p_id');
            $table->text('objective')->nullable(); 
            $table->bigInteger('contact');
            $table->string('resume_file')->nullable(); 
            $table->string('user_image')->nullable(); 
            $table->string('designation')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('country_id'); 
            $table->unsignedBigInteger('state_id'); 
            $table->unsignedBigInteger('city_id'); 
            
            $table->string('course')->nullable();
            $table->string('skills')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->foreign('state_id')->references('state_id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
