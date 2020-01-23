<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportPublicToPresonTypesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * Add the 'report_type' column to the 'person_types' table with a default value of 1.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_types', function (Blueprint $table) {
            $table->integer('report_type')->default(1); // Add 'report_type' column with a default value of 1
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the addition of the 'report_type' column.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_types', function (Blueprint $table) {
            // No need to perform any action during rollback
        });
    }
}
