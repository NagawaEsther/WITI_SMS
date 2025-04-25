<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnsToSemesters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Only add the column if it doesn't already exist
        if (!Schema::hasColumn('semesters', 'program')) {
            Schema::table('semesters', function (Blueprint $table) {
                $table->string('program')->nullable(); // Add column safely
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Only drop the column if it exists
        if (Schema::hasColumn('semesters', 'program')) {
            Schema::table('semesters', function (Blueprint $table) {
                $table->dropColumn('program');
            });
        }
    }
}
