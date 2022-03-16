<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_categories', function (Blueprint $table) {
            $table->id();
            $table->string("quiz_cat_name");
            $table->string("quiz_cat_code")->unique();
            $table->text("quiz_cat_icon");
            $table->integer("quiz_cat_order")->default(0);
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
        Schema::dropIfExists('quiz_categories');
    }
}
