<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoFieldsToNightTariff extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('nighttariff', function($table) {
      $table->string("night_tariff_seo_title")->nullable();
      $table->string("night_tariff_seo_keywords")->nullable();
      $table->text("night_tariff_seo_description")->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {

    Schema::table('nighttariff', function($table) {
      $table->dropColumn("night_tariff_seo_title");
      $table->dropColumn("night_tariff_seo_keywords");
      $table->dropColumn("night_tariff_seo_description");
    });
  }
}
