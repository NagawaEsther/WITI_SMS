<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLectureColumnInQrSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('qr_sessions', function (Blueprint $table) {
        $table->renameColumn('lecture_id', 'lectures_id');
    });
}

public function down()
{
    Schema::table('qr_sessions', function (Blueprint $table) {
        $table->renameColumn('lectures_id', 'lecture_id');
    });
}

}
