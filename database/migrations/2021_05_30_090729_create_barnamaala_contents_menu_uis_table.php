<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarnamaalaContentsMenuUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barnamaala_contents_menu_uis', function (Blueprint $table) {
            $table->id();
            $table->text("list_bg_image");
            $table->text("list_back_button_image");
            $table->text("list_letter_card_image");
            $table->text("list_header_image")->nullable();
            $table->text("particular_text_card_image");
            $table->text("particular_teacher_avatar_image")->nullable();
            $table->text("particular_back_button_image");
            $table->text("particular_background_image");
            $table->text("particular_auto_play_icon_image");
            $table->text("particular_auto_play_pause_icon_image");
            $table->enum('type', ['byanjan', 'barakhari', 'swor','sankhya']);
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
        Schema::dropIfExists('barnamaala_contents_menu_uis');
    }
}
