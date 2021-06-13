<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('node_id_1');
            $table->unsignedBigInteger('node_id_2');
            $table->bigInteger('distance');
            $table->unsignedBigInteger('road_type_id');

            $table->foreign('road_type_id')->references('id')->on('road_types');
            $table->foreign('node_id_1')->references('id')->on('nodes');
            $table->foreign('node_id_2')->references('id')->on('nodes');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roads');
    }
}
