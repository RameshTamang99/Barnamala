<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarakharisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barakharis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('byanjan_id');
            $table->foreign('byanjan_id')->references('id')->on('byanjans')->onDelete('cascade');
            $table->string("barakhari_name");
            $table->text("barakhari_audio");
            $table->integer("barakhari_order")->default(0);
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
        Schema::dropIfExists('barakharis');
    }
}
