<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeBoardsTable extends Migration
{
    public function up()
    {
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('title');  // Title of the notice
            $table->date('date');  // Date of the event
            $table->integer('views')->default(0);  // Views counter
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('notice_boards');
    }
}
