<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    



   
     public function up()
     {
         Schema::create('feedback', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('student_id'); // assuming students are authenticated users
             $table->text('message');
             $table->timestamps();
     
             $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
         });
     }
     


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}


    

