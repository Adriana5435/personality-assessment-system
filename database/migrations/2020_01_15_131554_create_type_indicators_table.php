<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_indicators', function (Blueprint $table) {
            $table->bigIncrements('id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('questionnaire_id'); // Foreign key to questionnaire
            $table->string('title_fa'); // Title in Farsi (Persian)
            $table->string('title_en'); // Title in English
            $table->char('symbol'); // Symbol character for the indicator
            $table->timestamps(); // Created_at and updated_at timestamps

            // Define foreign key relationship to questionnaires table
            $table->foreign('questionnaire_id')
                ->references('id')->on('questionnaires')
                ->onDelete('cascade'); // Delete related indicators if questionnaire is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_indicators'); // Drop the table if it exists
    }
}
