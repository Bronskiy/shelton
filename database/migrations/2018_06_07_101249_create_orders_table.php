<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('orders',function(Blueprint $table){
            $table->increments("id");
            $table->string("order_user_id")->nullable();
            $table->string("order_user_name")->nullable();
            $table->string("order_user_email")->nullable();
            $table->string("order_user_phone")->nullable();
            $table->integer("rooms_id")->references("id")->on("rooms")->nullable();
            $table->dateTime("order_user_arrival")->nullable();
            $table->dateTime("order_user_departure")->nullable();
            $table->decimal("order_price", 15, 2)->nullable();
            $table->text("order_user_message")->nullable();
            $table->string("order_approval")->nullable();
            $table->string("order_payment")->nullable();
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
        Schema::drop('orders');
    }

}