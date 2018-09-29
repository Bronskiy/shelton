<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateNightTariffTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('nighttariff',function(Blueprint $table){
            $table->increments("id");
            $table->string("night_tariff_title");
            $table->string("night_tariff_slug");
            $table->string("night_tariff_image");
            $table->text("night_tariff_text")->nullable();
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
        Schema::drop('nighttariff');
    }

}