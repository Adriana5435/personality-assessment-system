<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenerToUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * Add a 'gender' column to the 'users' table to store user's gender.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('gender')->unsigned()->nullable(); // User's gender (1: Male, 2: Female)
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the addition of 'gender' column from the 'users' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender'); // Drop the 'gender' column
        });
    }
}
