<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingCourseunitAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('course_units', function (Blueprint $table) {
        $table->string('thumbnailUrl')->nullable();
        $table->string('duration')->nullable();
        $table->date('startDate')->nullable();
        $table->date('endDate')->nullable();
        $table->integer('totalLessons')->nullable();
        $table->integer('totalHours')->nullable();
        $table->date('lastAccessedDate')->nullable();
        $table->string('lecturer_id')->nullable();
        $table->string('lecturer_name')->nullable();
        $table->string('lecturer_image')->nullable();
    });
}

public function down()
{
    Schema::table('course_units', function (Blueprint $table) {
        $table->dropColumn([
            'thumbnailUrl',
            'duration',
            'startDate',
            'endDate',
            'totalLessons',
            'totalHours',
            'lastAccessedDate',
            'lecturer_id',
            'lecturer_name',
            'lecturer_image',
        ]);
    });
}

}
