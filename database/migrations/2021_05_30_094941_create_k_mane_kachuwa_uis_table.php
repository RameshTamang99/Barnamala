<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKManeKachuwaUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_mane_kachuwa_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("back_button_image");
            $table->text("text_display_card_image");
            $table->text("autoplay_image");
            $table->text("autoplay_pause_image");
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
        Schema::dropIfExists('k_mane_kachuwa_uis');
    }
}
