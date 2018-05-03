<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('user_id');
            $table->string('expenseDescription');
            $table->integer('cost');
            $table->date('date');
            $table->string('category');
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
        Schema::dropIfExists('property_expenses');
    }
}
