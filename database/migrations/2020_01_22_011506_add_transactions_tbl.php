<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * Create the 'submits' table in the database with necessary columns and indexes.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submits', function (Blueprint $table) {
            // Primary key for submits table
            $table->bigIncrements('id');

            // Foreign key reference to users table
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Reference to 'users' table

            // Foreign key reference to questionnaires table
            $table->unsignedBigInteger('questionnaire_id');
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires'); // Reference to 'questionnaires' table

            // Payment gateway transaction ID
            $table->bigInteger('gateway_transaction_id');

            // Serialized submission data
            $table->longText('submit_data');

            // Submission status: 1 for unpaid, 2 for paid (default: unpaid)
            $table->tinyInteger('status')->unsigned()->default(1); // Submission status: 1 for unpaid

            // Timestamps for creation and update
            $table->timestamps(); // Creation and update timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drop the 'submits' table from the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submits'); // Drop the 'submits' table
    }
}
