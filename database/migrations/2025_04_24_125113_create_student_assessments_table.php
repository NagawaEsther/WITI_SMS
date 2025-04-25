<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('student_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('course_unit_id')->constrained('course_units')->onDelete('cascade');
            $table->foreignId('semester_id')->constrained('semesters')->onDelete('cascade');
            $table->foreignId('year_id')->constrained('years')->onDelete('cascade');
            $table->enum('assessment_type', ['Continuous Assessment', 'Final Grade Calculation']);
            $table->json('marks')->nullable(); // Store all marks as JSON
            $table->float('total_marks')->nullable(); // Final calculated percentage
            $table->string('grade')->nullable();
            $table->text('lecturer_comments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('student_assessments');
    }
};