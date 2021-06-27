<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
//            $table->unsignedBigInteger('load_type_id');
            $table->unsignedBigInteger('from_town_id');
            $table->unsignedBigInteger('to_town_id');
            $table->bigInteger('loading_capacity');
            $table->bigInteger('economic_performance')->nullable();
            $table->dateTime('start_loading');
            $table->dateTime('finish_loading');

            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
//            $table->foreign('load_type_id')->references('id')->on('load_types');
            $table->foreign('from_town_id')->references('id')->on('towns');
            $table->foreign('to_town_id')->references('id')->on('towns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_settings');
    }
}
