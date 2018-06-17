<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRoomsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('rooms',function(Blueprint $table){
            $table->increments("id");
            $table->string("room_title");
            $table->string("room_slug");
            $table->text("room_text")->nullable();
            $table->string("room_price")->nullable();
            $table->string("room_price_night")->nullable();
            $table->string("room_price_24")->nullable();
            $table->string("room_photo")->nullable();
            $table->string("room_gallery")->nullable();
            $table->integer("language_id")->references("id")->on("language");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms');
    }

}
