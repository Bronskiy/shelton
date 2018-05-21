<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCommonPagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('commonpages',function(Blueprint $table){
            $table->increments("id");
            $table->string("common_title");
            $table->text("common_text")->nullable();
            $table->string("common_seo_title")->nullable();
            $table->string("common_seo_keywords")->nullable();
            $table->text("common_seo_description")->nullable();
            $table->string("common_slug");
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
        Schema::drop('commonpages');
    }

}