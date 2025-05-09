<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon'); // Store an icon name, URL, or class
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recent_activities');
    }
};
