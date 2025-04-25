<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('qr_sessions', function (Blueprint $table) {
            // First, drop the incorrect foreign key if it exists
            $table->dropForeign(['course_units_id']);

            // Then, add the correct foreign key constraint
            $table->foreign('course_units_id')->references('id')->on('course_units')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('qr_sessions', function (Blueprint $table) {
            $table->dropForeign(['course_units_id']);
            $table->foreign('course_units_id')->constrained()->onDelete('cascade'); // original assumption
        });
    }
};
