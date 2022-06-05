<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddUniqueToAssignmentsAndRollCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            if (Schema::hasColumn('assignments', 'subject_id') && Schema::hasColumn('assignments', 'my_class_id')) {
                $table->unique(['subject_id', 'my_class_id']);
            }
        });

        Schema::table('roll_calls', function (Blueprint $table) {
            if (Schema::hasColumn('roll_calls', 'subject_id') && Schema::hasColumn('roll_calls', 'my_class_id') && Schema::hasColumn('roll_calls', 'teacher_id')) {
                $table->unique(['subject_id', 'my_class_id', 'teacher_id']);
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
        Schema::table('assignments_and_roll_calls', function (Blueprint $table) {
            //
        });
    }
}
