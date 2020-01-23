<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonTypeToSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Add the 'person_type' column to the 'submits' table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->char('person_type', 4)->nullable(); // Add 'person_type' column of type char(4) and nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the addition of the 'person_type' column.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->dropColumn('person_type'); // Drop the 'person_type' column
        });
    }
}
