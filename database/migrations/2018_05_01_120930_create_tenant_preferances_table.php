<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantPreferancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_preferances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('type');
            $table->string('rent');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->boolean('status')->default('0');
            $table->string('user_name');
            $table->integer('user_id'); //Tenant ID
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
        Schema::dropIfExists('tenant_preferances');
    }
}
