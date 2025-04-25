<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id('id');
            $table->string('institution_name')->default("WITI");
            $table->string('copyright')->default("WITI Copyrights all rights reserved @2024");
            $table->string('system_logo');
            $table->string('motto');
            $table->string('address')->default("Kamwokya");
            $table->string('contact_one');
            $table->string('contact_two')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
