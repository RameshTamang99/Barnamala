<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginScreenUisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_screen_uis', function (Blueprint $table) {
            $table->id();
            $table->text("background_image");
            $table->text("header_text_image");
            $table->text("login_button_image");
            $table->text("fb_button_image");
            $table->text("google_button_image");
            $table->text("password_forget_button_image");
            $table->text("new_account_button_image");
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
        Schema::dropIfExists('login_screen_uis');
    }
}
