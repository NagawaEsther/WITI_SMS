<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->unique();
            $table->string('status')->default('active');
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('created_by')->nullable()->constrained("users")->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('program')->nullable()->constrained("programs")->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::drop('semesters');
    }
}
