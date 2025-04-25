<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table does not exist before creating it
        if (!Schema::hasTable('referral_sources')) {
            Schema::create('referral_sources', function (Blueprint $table) {
                $table->id(); // Auto-incrementing ID for the referral source
                $table->string('source_name'); // Column for the referral source name
                $table->enum('status', ['active', 'inactive']); // Column for the referral source status
                $table->timestamps(); // Timestamps for created_at and updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_sources');
    }
}