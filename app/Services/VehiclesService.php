<?php

namespace App\Services;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\OffersServiceInterface;
use App\Contracts\VehiclesServiceInterface;
use App\Models\Load;
use App\Models\Offer;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class VehiclesService implements VehiclesServiceInterface
{

    public function newVehicle(): Vehicle
    {
        $vehicle = Vehicle::factory()->create();
//        dd($offer);
        return $vehicle;
    }

}
