<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCohortIdToStudentApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('student_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('cohort_id')->nullable()->after('national_id');
            // If there is a cohort table, you can add a foreign key constraint like this:
            $table->foreign('cohort_id')->references('id')->on('cohorts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('student_applications', function (Blueprint $table) {
            $table->dropColumn('cohort_id');
        });
    }
}
