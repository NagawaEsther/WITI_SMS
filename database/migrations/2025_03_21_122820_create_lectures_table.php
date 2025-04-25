<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('course_units_id');
            $table->string('file_path')->nullable();
            $table->string('video_url')->nullable();
            $table->string('posted_by');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('course_units_id')->references('id')->on('course_units')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
