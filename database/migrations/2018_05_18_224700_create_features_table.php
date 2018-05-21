<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateFeaturesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('features',function(Blueprint $table){
            $table->increments("id");
            $table->string("feature_title");
            $table->string("feature_icon")->nullable();
            $table->string("feature_text")->nullable();
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
        Schema::drop('features');
    }

}