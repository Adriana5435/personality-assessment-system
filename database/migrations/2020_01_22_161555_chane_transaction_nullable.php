<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChaneTransactionNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * Modify the 'gateway_transaction_id' column in the 'submits' table to allow null values.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submits', function (Blueprint $table) {
            $table->bigInteger('gateway_transaction_id')->nullable()->change(); // Modify the 'gateway_transaction_id' column to allow null values
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the modification of the 'gateway_transaction_id' column.
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
