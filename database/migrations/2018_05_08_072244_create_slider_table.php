<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSliderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('slider',function(Blueprint $table){
            $table->increments("id");
            $table->string("slider_title");
            $table->text("slider_text")->nullable();
            $table->string("slider_order")->nullable();
            $table->string("slider_image")->nullable();
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
        Schema::drop('slider');
    }

}
