<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->unique();
            $table->string('duration');
            $table->string('status')->default("active");
            $table->string('program_code')->nullable();
            $table->integer('credit_required')->default(3);
            $table->foreignId('created_by')->nullable()->constrained("users")->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::drop('programs');
    }
}
