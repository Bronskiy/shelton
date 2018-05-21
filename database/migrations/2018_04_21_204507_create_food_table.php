<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateFoodTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('food',function(Blueprint $table){
            $table->increments("id");
            $table->string("food_title");
            $table->string("food_slug");
            $table->string("food_consist")->nullable();
            $table->string("food_qty")->nullable();
            $table->string("food_price")->nullable();
            $table->string("food_image")->nullable();
            $table->integer("foodcategories_id")->references("id")->on("foodcategories");
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
        Schema::drop('food');
    }

}
