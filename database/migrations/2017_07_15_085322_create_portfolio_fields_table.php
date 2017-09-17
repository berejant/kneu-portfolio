<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('portfolio_category_id');
            $table->foreign('portfolio_category_id')->references('id')->on('portfolio_categories');
            $table->text('name');
            $table->unsignedTinyInteger('value_type');
            $table->text('hint');
            $table->text('config');
            $table->boolean('allow_description');
            $table->unsignedTinyInteger('date_type');
            $table->unsignedTinyInteger('order_index');
            $table->index('order_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_fields');
    }
}
