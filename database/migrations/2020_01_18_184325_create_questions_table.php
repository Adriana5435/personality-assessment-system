<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('questionnaire_id'); // Foreign key to questionnaire
            $table->unsignedBigInteger('pair_id'); // Foreign key to pairs
            $table->text('title'); // Question title
            $table->integer('point_first'); // Points for first option
            $table->text('option_first'); // First option text
            $table->unsignedBigInteger('type_indicator_1_id'); // Foreign key to type_indicators (1)
            $table->integer('point_second'); // Points for second option
            $table->text('option_second'); // Second option text
            $table->unsignedBigInteger('type_indicator_2_id'); // Foreign key to type_indicators (2)
            $table->timestamps(); // Created_at and updated_at timestamps

            // Define foreign key relationships to related tables
            $table->foreign('questionnaire_id')
                ->references('id')->on('questionnaires')
                ->onDelete('cascade'); // Delete related questions if questionnaire is deleted

            $table->foreign('pair_id')
                ->references('id')->on('pairs')
                ->onDelete('cascade'); // Delete related questions if pair is deleted

            $table->foreign('type_indicator_1_id')
                ->references('id')->on('type_indicators')
                ->onDelete('cascade'); // Delete related questions if type_indicator_1 is deleted

            $table->foreign('type_indicator_2_id')
                ->references('id')->on('type_indicators')
                ->onDelete('cascade'); // Delete related questions if type_indicator_2 is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions'); // Drop the table if it exists
    }
}
