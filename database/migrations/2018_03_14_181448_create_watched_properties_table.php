<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchedPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watched_properties', function (Blueprint $table) {
          $table->increments('id');
          $table->string('image_url');
          $table->integer('watchlists_id');
          $table->string('image_info');
          $table->string('address');
          $table->string('town');
          $table->string('county');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watched_properties');
    }
}
