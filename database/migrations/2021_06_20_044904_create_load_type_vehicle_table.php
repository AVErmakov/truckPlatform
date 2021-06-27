<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadTypeVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_type_vehicle', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('vehicle_id');
        $table->unsignedBigInteger('load_type_id');
        $table->timestamps();

        $table->foreign('vehicle_id')->references('id')->on('vehicles');
        $table->foreign('load_type_id')->references('id')->on('load_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('load_type_vehicle');
    }
}
