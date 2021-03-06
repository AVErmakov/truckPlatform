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
//        TODO: JSON field date_time
//        TODO: ? identificator no increment ?
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_town_id');
            $table->unsignedBigInteger('to_town_id');
            $table->unsignedBigInteger('load_types_id');
//            $table->bigInteger('profit')->nullable();
            $table->dateTime('start_loading');
            $table->dateTime('finish_loading');

            $table->bigInteger('weight');
            $table->bigInteger('price')->nullable();
            $table->text('description')->nullable()->nullable();
            $table->timestamps();

            $table->foreign('from_town_id')->references('id')->on('towns');
            $table->foreign('to_town_id')->references('id')->on('towns');
            $table->foreign('load_types_id')->references('id')->on('load_types');

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
