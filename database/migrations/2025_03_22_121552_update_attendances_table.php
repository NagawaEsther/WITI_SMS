<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Add new columns
            $table->foreignId('student_id')->constrained()->onDelete('cascade')->after('id');
            $table->foreignId('lecture_id')->constrained()->onDelete('cascade')->after('student_id');
            $table->boolean('is_present')->after('lecture_id');
            $table->ipAddress('ip_address')->after('is_present');
            $table->timestamp('registered_at')->useCurrent()->after('ip_address'); // Set default to CURRENT_TIMESTAMP
            $table->string('status')->after('registered_at');

            // Drop old columns if they exist (optional, only if you want to remove the old ones)
            // $table->dropColumn('student_name');
            // $table->dropColumn('latitude');
            // $table->dropColumn('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Remove the columns that were added
            $table->dropColumn('student_name');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
           
        });
    }
}
