<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentApplicationsTable extends Migration
{
    
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('student_applications', function (Blueprint $table) {
                    $table->id();
                    $table->date('date_of_birth');
                    $table->string('address');
                    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                    $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
                    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                    $table->string('nationality');
                    $table->string('guardian_name');
                    $table->string('guardian_contact');
                    $table->date('interview_date')->nullable();
                    $table->enum('interview_result', ['pending', 'passed', 'failed'])->default('pending');
                    $table->json('submitted_documents');
                    $table->string('secondary_school');
                    $table->string('combination');
                    $table->integer('points_scored');
                    $table->string('uace_year_of_completion')->nullable();
                    $table->timestamps();
                });
            }
        
            public function down()
            {
                Schema::dropIfExists('student_applications');
            }
        };
        
            
        
        
// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateStudentApplicationsTable extends Migration
// 