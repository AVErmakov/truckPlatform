<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('weight');
            $table->unsignedBigInteger('from_town_id');
            $table->unsignedBigInteger('to_town_id');

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
        Schema::dropIfExists('loads');
    }
}
