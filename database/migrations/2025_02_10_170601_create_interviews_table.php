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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id('interview_id'); 
            $table->date('schedule_date');
            $table->time('start_time'); 
            $table->time('end_time')->nullable(); 
            $table->text('meeting_link')->nullable(); 
            $table->string('status')->default('scheduled'); 
            
            $table->unsignedBigInteger('app_id');

            $table->timestamps();

            $table->foreign('app_id')->references('app_id')->on('job_applied')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
