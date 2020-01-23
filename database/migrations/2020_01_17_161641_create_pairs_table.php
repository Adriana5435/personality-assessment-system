<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairs', function (Blueprint $table) {
            $table->bigIncrements('id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('questionnaire_id'); // Foreign key to questionnaire
            $table->unsignedBigInteger('type_indicator_1_id'); // Foreign key to type_indicators (1)
            $table->unsignedBigInteger('type_indicator_2_id'); // Foreign key to type_indicators (2)
            $table->unsignedBigInteger('type_indicator_prefered_id'); // Foreign key to type_indicators (prefered)
            $table->timestamps(); // Created_at and updated_at timestamps

            // Define foreign key relationships to related tables
            $table->foreign('questionnaire_id')
                ->references('id')->on('questionnaires')
                ->onDelete('cascade'); // Delete related pairs if questionnaire is deleted

            $table->foreign('type_indicator_1_id')
                ->references('id')->on('type_indicators')
                ->onDelete('cascade'); // Delete related pairs if type_indicator_1 is deleted

            $table->foreign('type_indicator_2_id')
                ->references('id')->on('type_indicators')
                ->onDelete('cascade'); // Delete related pairs if type_indicator_2 is deleted

            $table->foreign('type_indicator_prefered_id')
                ->references('id')->on('type_indicators')
                ->onDelete('cascade'); // Delete related pairs if type_indicator_prefered is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pairs'); // Drop the table if it exists
    }
}
