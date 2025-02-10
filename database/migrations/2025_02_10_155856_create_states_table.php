<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id('state_id'); // Primary Key
            $table->unsignedBigInteger('country_id'); // Foreign Key
            $table->string('state_name');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
