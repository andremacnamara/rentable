<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->string('landlord_name');
            $table->integer('landlord_id');
            $table->string('tenant_name');
            $table->integer('tenant_id');
            $table->string('property_address');
            $table->string('overall_rating');
            $table->string('landlord_communication_rating');
            $table->string('issue_resolved_speed_rating');
            $table->string('rent_market_rate');
            $table->string('happy_to_continue_tenancy');
            $table->string('other_comments');
            $table->string('recommend_landlord');
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
        Schema::dropIfExists('feedback');
    }
}
