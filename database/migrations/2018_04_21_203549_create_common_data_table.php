<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCommonDataTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('commondata',function(Blueprint $table){
            $table->increments("id");
            $table->string("common_phone_1");
            $table->string("common_phone_2")->nullable();
            $table->string("common_address")->nullable();
            $table->text("common_contact_details")->nullable();
            $table->string("common_map")->nullable();
            $table->string("common_email")->nullable();
            $table->string("common_ganalytics")->nullable();
            $table->string("common_metrika")->nullable();
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
        Schema::drop('commondata');
    }

}
