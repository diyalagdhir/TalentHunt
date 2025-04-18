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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id('company_id');
            $table->text('description');
            $table->BigInteger('registration_number')->nullable();
            $table->string('industry_type')->nullable();
            $table->BigInteger('contact')->nullable();
            $table->text('address')->nullable();
            $table->string('website_url')->nullable();
            $table->string('established_date')->nullable();
            $table->string('num_of_emp')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('logo_image')->nullable();

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
        Schema::dropIfExists('company_profiles');
    }
};
