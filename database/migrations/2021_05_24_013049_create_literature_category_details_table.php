<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiteratureCategoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literature_category_details', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->foreign('category_id')->references('category_id')->on('literature_categories')->onDelete('cascade');
            $table->string("title_name");
            $table->text("thumbnail_image")->nullable();
            $table->text("vimeo_id")->nullable();
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
        Schema::dropIfExists('literature_category_details');
    }
}
