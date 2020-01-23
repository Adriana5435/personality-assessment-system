<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubmitedAtInSubmitsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * Add a 'submit_at' column to the 'submits' table to store submission timestamp.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->timestamp('submit_at')->nullable(); // Submission timestamp (nullable)
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the addition of 'submit_at' column from the 'submits' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->dropColumn('submit_at'); // Drop the 'submit_at' column
        });
    }
}
