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
        Schema::create('job_upload', function (Blueprint $table) {
            $table->id('job_id'); 
            $table->string('title');
            $table->text('description')->nullable();
            $table->bigInteger('num_of_vacancy')->default(1);
            $table->string('experience')->nullable();
            $table->string('job_skill_required')->nullable();
            $table->string('status')->default('open'); 
            $table->string('job_working_hours')->nullable();
            $table->date('posted_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->string('contact_email')->nullable();

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');

            $table->timestamps();

            $table->foreign(columns: 'company_id')->references(columns:'id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('job_categories')->onDelete('cascade');
            $table->foreign('department_id')->references('department_id')->on('job_departments')->onDelete('cascade');
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
        Schema::dropIfExists('job_upload');
    }
};
//ALTER TABLE job_applied DROP FOREIGN KEY job_applied_job_id_foreign;
//ALTER TABLE job_applied DROP INDEX job_applied_job_id_foreign;
