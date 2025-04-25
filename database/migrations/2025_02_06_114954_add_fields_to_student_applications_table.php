<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStudentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('student_applications', function (Blueprint $table) {
        $table->string('firstname');
        $table->string('lastname');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->string('phone_number2')->nullable();
        $table->enum('gender', ['male', 'female', 'other']); // You can modify this enum based on your requirements
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_applications', function (Blueprint $table) {
            $table->dropColumn(['firstname', 'lastname', 'email', 'phone_number', 'phone_number2', 'gender']);
        });
}
}