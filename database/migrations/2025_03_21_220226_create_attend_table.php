<?php




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendTable extends Migration
{
    public function up()
    {
        Schema::create('attend', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('lecture_id')->constrained('lectures');
            $table->boolean('is_present')->default(false); // Marks attendance as present or not
            $table->string('ip_address'); // Store the IP address of the student when they register
            $table->timestamp('registered_at')->nullable(); // Time of registration
            $table->enum('status', ['pending', 'registered', 'late'])->default('pending'); // Status of attendance
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attend');
    }
}
