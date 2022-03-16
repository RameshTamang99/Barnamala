<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKManeKachuwasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_mane_kachuwas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('byanjan_id');
            $table->foreign('byanjan_id')->references('id')->on('byanjans')->onDelete('cascade');
            $table->string("kmk_name");
            $table->text("kmk_image");
            $table->text("kmk_audio");
            $table->integer("kmk_order")->default(0);
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
        Schema::dropIfExists('k_mane_kachuwas');
    }
}

