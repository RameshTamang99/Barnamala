<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativeMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informative_menus', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("status")->default(1);
            $table->string("menu_id")->unique();
            $table->longText("description");
            $table->text("background");
            $table->text("back_icon");
            $table->text("card_image");
            $table->integer("order")->default(0);
            $table->timestamp("deleted_at")->nullable();
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
        Schema::dropIfExists('informative_menus');
    }
}
