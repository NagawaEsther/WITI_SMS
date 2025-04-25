<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToCohortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cohorts', function (Blueprint $table) {
            if (!Schema::hasColumn('cohorts', 'name')) {
                $table->string('name', 150)->unique()->after('id');
            }
            if (!Schema::hasColumn('cohorts', 'start_date')) {
                $table->date('start_date')->after('name');
            }
            if (!Schema::hasColumn('cohorts', 'end_date')) {
                $table->date('end_date')->nullable()->after('start_date');
            }
            if (!Schema::hasColumn('cohorts', 'status')) {
                $table->enum('status', ['active', 'inactive'])->after('end_date');
            }
            if (!Schema::hasColumn('cohorts', 'number_of_students')) {
                $table->integer('number_of_students')->default(0)->after('status');
            }
            $table->date('expected_graduation_date')->nullable()->after('number_of_students');

            if (!Schema::hasColumn('cohorts', 'curriculum')) {
                $table->enum('curriculum', ['old', 'new'])->after('expected_graduation_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cohorts', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'start_date',
                'end_date',
                'status',
                'number_of_students',
                'expected_graduation_date',
                'curriculum',
            ]);
        });
    }
}
