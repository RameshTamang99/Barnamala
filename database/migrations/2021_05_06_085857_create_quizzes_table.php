<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('quiz_cat_code');
            $table->foreign('quiz_cat_code')->references('quiz_cat_code')->on('quiz_categories')->onDelete('cascade');
            $table->text("question");
            $table->text("option_1");
            $table->text("option_2");
            $table->text("option_3");
            $table->text("option_4");
            $table->enum('right_option',['1','2','3','4']);
            $table->enum('question_level', ['sajilo', 'madhyama', 'gaaro']);
            $table->integer("quiz_order")->default(0);
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
        Schema::dropIfExists('quizzes');
    }
}
