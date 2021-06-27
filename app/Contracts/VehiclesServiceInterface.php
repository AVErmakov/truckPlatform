<?php

namespace App\Contracts;

use App\Models\Vehicle;

interface VehiclesServiceInterface
{
    public function newVehicle(): Vehicle;
}
