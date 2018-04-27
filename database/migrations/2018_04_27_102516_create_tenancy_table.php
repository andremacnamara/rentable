<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenancy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->string('tenant_name');
            $table->integer('landlord_id');
            $table->string('landlord_name');
            $table->string('property_address');
            $table->boolean('request_sent')->default('1');
            $table->boolean('accepted')->default('0');
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
        Schema::dropIfExists('tenancy');
    }
}
