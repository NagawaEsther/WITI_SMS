<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentApplicationReferralSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table doesn't exist before creating it
        if (!Schema::hasTable('student_application_referral_sources')) {
            Schema::create('student_application_referral_sources', function (Blueprint $table) {
                $table->id(); // Auto-incrementing ID for the student application referral source

                // Foreign key references
                $table->unsignedBigInteger('student_application_id');
                $table->unsignedBigInteger('referral_source_id');
                
                $table->timestamps(); // Timestamps for created_at and updated_at

                // Foreign key constraints with custom names to avoid long names
                $table->foreign('student_application_id', 'student_app_referral_source_student_application_id_foreign')
                      ->references('id')->on('student_applications')->onDelete('cascade');
                $table->foreign('referral_source_id', 'student_app_referral_source_referral_source_id_foreign')
                      ->references('id')->on('referral_sources')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_application_referral_sources');
    }
}