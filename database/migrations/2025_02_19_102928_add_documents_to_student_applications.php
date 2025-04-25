<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsToStudentApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('student_applications', function (Blueprint $table) {
        $table->string('uce')->nullable();
        $table->string('uace')->nullable();
        $table->string('national_id')->nullable();
        $table->string('recommendation_letter')->nullable();
        $table->dropColumn('submitted_documents');
    });
}

public function down()
{
    Schema::table('student_applications', function (Blueprint $table) {
        $table->dropColumn(['uce', 'uace', 'national_id', 'recommendation_letter']);
        $table->string('submitted_documents')->nullable();
    });
}
}