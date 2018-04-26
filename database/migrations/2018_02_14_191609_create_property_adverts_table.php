<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("photo");
            $table->string('address');
            $table->string('county');
            $table->string('town');
            $table->string('type');
            $table->string('rent');
            $table->string('date');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('furnished');
            $table->longText('description');
            $table->integer('user_id'); //Landlord ID
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
        Schema::dropIfExists('property_adverts');
    }
}
