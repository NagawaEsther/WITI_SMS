<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('attendance_records', function (Blueprint $table) {
            // Drop old foreign key if needed
            $table->dropForeign(['course_units_id']);

            // Add correct constraint
            $table->foreign('course_units_id')->references('id')->on('course_units')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('attendance_records', function (Blueprint $table) {
            $table->dropForeign(['course_units_id']);
            $table->foreign('course_units_id')->constrained(); // old version
        });
    }
};
