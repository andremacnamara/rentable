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
            $table->string('overallRating');
            $table->string('landlordCommunicationRating');
            $table->string('issueResolvedSpeedRating');
            $table->string('rentMarketRate');
            $table->string('happyToContinueTenancy');
            $table->string('otherComments');
            $table->string('recommendLandlord');
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
