<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_modules_table.php
public function up()
{
    Schema::create('modules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_unit_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->string('subtitle')->nullable(); // like "Advanced"
        $table->integer('lesson_count');
        $table->string('duration'); // e.g. "3h 10m"
        $table->enum('status', ['completed', 'current', 'locked'])->default('locked');
        $table->string('icon')->nullable(); // font-awesome or similar
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
