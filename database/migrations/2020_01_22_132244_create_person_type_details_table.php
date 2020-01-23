<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Create the 'person_type_details' table to store additional details for each person type associated with questionnaires.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_type_details', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key for 'person_type_details' table
            $table->unsignedBigInteger('person_type_id'); // Foreign key referencing 'person_types' table
            $table->foreign('person_type_id')->references('id')->on('person_types')->onDelete('cascade');
            $table->char('key'); // Key to identify the detail information
            $table->longText('value')->nullable(); // Value of the detail information (can be null)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the creation of the 'person_type_details' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_type_details'); // Drop the 'person_type_details' table
    }
}
