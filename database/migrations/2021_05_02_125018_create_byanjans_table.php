<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateByanjansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('byanjans', function (Blueprint $table) {
            $table->id();
            $table->string("byanjan_name");
            $table->text("byanjan_audio");
            $table->integer("byanjan_order")->default(0);
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
        Schema::dropIfExists('byanjans');
    }
}
