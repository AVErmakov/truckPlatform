<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('town_1_id');
            $table->unsignedBigInteger('town_2_id');
            $table->bigInteger('distance');

            $table->foreign('town_1_id')->references('id')->on('towns');
            $table->foreign('town_2_id')->references('id')->on('towns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distances');
    }
}
