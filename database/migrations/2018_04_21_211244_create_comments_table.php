<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('comments',function(Blueprint $table){
            $table->increments("id");
            $table->string("comment_name")->nullable();
            $table->string("comment_phone")->nullable();
            $table->string("comment_email")->nullable();
            $table->text("comment_text")->nullable();
            $table->text("comment_admin")->nullable();
            $table->integer("rooms_id")->references("id")->on("rooms")->nullable();
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
        Schema::drop('comments');
    }

}
