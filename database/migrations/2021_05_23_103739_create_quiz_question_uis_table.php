<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("header_image")->nullable();
            $table->text("score_card_image")->nullable();
            $table->text("time_card_image")->nullable();
            $table->text("question_card_image");
            $table->text("answer_card_image");
            $table->text("plus_one_image");
            $table->text("winner_model_image");
            $table->text("lost_model_image");
            $table->text("play_again_button_image");
            $table->text("go_to_home_button_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_question_uis');
    }
}
