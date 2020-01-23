<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySubmitDataNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modify the 'submit_data' column in the 'submits' table to allow null values.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->longText('submit_data')->nullable()->change(); // Modify the 'submit_data' column to allow null values
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the modification of the 'submit_data' column.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submits', function (Blueprint $table) {
            // No need to perform any action during rollback
        });
    }
}
