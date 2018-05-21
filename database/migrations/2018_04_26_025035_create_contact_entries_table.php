<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateContactEntriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('contactentries',function(Blueprint $table){
            $table->increments("id");
            $table->string("contact_name")->nullable();
            $table->string("contact_phone")->nullable();
            $table->string("contact_email")->nullable();
            $table->text("contact_text")->nullable();
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
        Schema::drop('contactentries');
    }

}