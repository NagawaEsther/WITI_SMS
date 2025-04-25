<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('atendances', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('program_id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('ip_address');
        $table->date('date');
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendance');
    }
}
