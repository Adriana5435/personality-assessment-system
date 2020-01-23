<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToUsersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * Add an 'avatar' column to the 'users' table to store the user's avatar file name.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable(); // User's avatar file name
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the addition of the 'avatar' column from the 'users' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar'); // Drop the 'avatar' column
        });
    }
}
