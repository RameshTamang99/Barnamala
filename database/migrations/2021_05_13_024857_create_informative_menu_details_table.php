<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativeMenuDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informative_menu_details', function (Blueprint $table) {
            $table->id();
            $table->string('menu_id');
            $table->foreign('menu_id')->references('menu_id')->on('informative_menus')->onDelete('cascade');
            $table->string("imd_name");
            $table->text("imd_image")->nullable();
            $table->text("imd_audio")->nullable();
            $table->text("imd_video")->nullable();
            $table->text("imd_background_image")->nullable();
            $table->longText("imd_description")->nullable();
            $table->integer("imd_order")->default(0);
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
        Schema::dropIfExists('informative_menu_details');
    }
}
