<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateFoodCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('foodcategories',function(Blueprint $table){
            $table->increments("id");
            $table->string("food_cat_title");
            $table->string("food_cat_slug");
            $table->integer("foodcategories_id")->references("id")->on("foodcategories")->nullable();
            $table->text("food_cat_text")->nullable();
            $table->string("food_cat_photo")->nullable();
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
        Schema::drop('foodcategories');
    }

}
