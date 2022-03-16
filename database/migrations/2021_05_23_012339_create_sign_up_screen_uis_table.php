<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignUpScreenUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_up_screen_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("header_text_image")->nullable();
            $table->text("sign_up_button_image");
            $table->text("login_button_image");
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
        Schema::dropIfExists('sign_up_screen_uis');
    }
}
