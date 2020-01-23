<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Create the 'person_types' table to store different person types associated with questionnaires.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_types', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key for 'person_types' table
            $table->unsignedBigInteger('questionnaire_id'); // Foreign key referencing 'questionnaires' table
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade');
            $table->char('type'); // Type of person associated with the questionnaire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Rollback the creation of the 'person_types' table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_types'); // Drop the 'person_types' table
    }
}
