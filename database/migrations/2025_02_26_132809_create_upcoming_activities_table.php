<?php

// database/migrations/YYYY_MM_DD_create_upcoming_activities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('upcoming_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('time');
            $table->string('status');
            $table->string('icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('upcoming_activities');
    }
}
