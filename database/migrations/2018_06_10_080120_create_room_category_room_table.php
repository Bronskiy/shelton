<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomCategoryRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('roomcategory_room')) {
            Schema::create('roomcategory_room', function (Blueprint $table) {
                $table->integer('roomcategory_id')->unsigned()->nullable();
                $table->foreign('roomcategory_id')->references('id')->on('roomcategories')->onDelete('cascade');
                $table->integer('room_id')->unsigned()->nullable();
                $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomcategory_room');
    }
}
