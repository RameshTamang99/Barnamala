<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarnamaalaMenuUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barnamaala_menu_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("back_button_image");
            $table->text("byanjan_menu_button_image");
            $table->text("ka_mane_kachuwa_menu_button_image");
            $table->text("barakhari_menu_button_image");
            $table->text("swor_menu_button_image");
            $table->text("sankhya_menu_button_image");
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
        Schema::dropIfExists('barnamaala_menu_uis');
    }
}
