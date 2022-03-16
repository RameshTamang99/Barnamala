<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeScreenUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_screen_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("quiz_icon_image");
            $table->text("literature_icon_image");
            $table->text("barnamaala_icon_image");
            $table->text("informatives_icon_image");
            $table->text("profile_icon_image");
            $table->text("sound_on_icon_image");
            $table->text("sound_off_icon_image");
            $table->text("close_icon_image");
            $table->text("close_model_image");
            $table->text("close_button_image");
            $table->text("dont_close_button_image");
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
        Schema::dropIfExists('home_screen_uis');
    }
}
