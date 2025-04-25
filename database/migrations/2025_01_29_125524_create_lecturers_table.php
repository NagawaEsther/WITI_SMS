<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('lecturers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_number')->nullable();
        $table->string('gender');
        $table->string('position')->nullable();
        $table->string('status')->nullable();
        $table->string('supervised_students')->nullable();
        $table->string('social_links')->nullable();
        $table->string('office_hours')->nullable();
        $table->string('password')->unique();
        $table->string('image')->nullable();
        $table->timestamps();
    });
}
/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }

}