<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('qr_session_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_units_id')->constrained();
            $table->string('status')->default('present');
            $table->string('ip_address')->nullable();
            $table->timestamps();
            
            // Prevent duplicate attendance records
            $table->unique(['student_id', 'qr_session_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_records');
    }
};