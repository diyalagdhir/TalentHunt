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
        Schema::create('job_applied', function (Blueprint $table) {
            $table->id('app_id'); 
            $table->string('application_status')->default('pending'); 
            $table->text('message')->nullable();
            $table->string('resume');
            $table->string('experience')->nullable();
            $table->date('application_date')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');

            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('job_id')->on('job_upload')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applied');
    }
};
