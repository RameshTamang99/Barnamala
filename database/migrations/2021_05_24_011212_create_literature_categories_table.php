<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiteratureCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literature_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("status")->default(1);
            $table->string("category_id")->unique();
            $table->text("icon_image");
            $table->text("bg_image_details");
            $table->text("back_button_details");
            $table->text("card_button_details")->nullable();
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
        Schema::dropIfExists('literature_categories');
    }
}
