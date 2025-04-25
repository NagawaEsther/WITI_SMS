<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCourseUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_units', function (Blueprint $table) {
            $table->string('course_unit_code')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active')->after('course_unit_code');
            $table->integer('semester_id')->after('status');
            $table->integer('credit_unit')->default(3)->after('semester_id');
            $table->integer('created_by')->after('credit_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_units', function (Blueprint $table) {
            $table->dropColumn(['course_unit_code', 'status', 'semester_id', 'credit_unit', 'created_by']);
        });
    }
}
