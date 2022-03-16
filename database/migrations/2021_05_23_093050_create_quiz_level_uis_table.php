<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizLevelUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_level_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("back_button_image");
            $table->text("sajilo_level_button_image");
            $table->text("madhyama_level_button_image");
            $table->text("gaaro_level_button_image");
            $table->text("avatar_image")->nullable();
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
        Schema::dropIfExists('quiz_level_uis');
    }
}
