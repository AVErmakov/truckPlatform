<?php

namespace App\Contracts;

use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Models\Load;
use App\Models\Offer;
use App\Models\Town;
use App\Models\Vehicle;

interface LoadsServiceInterface
{
    public function findPath(Town $from, Town $to, Load $load): PathEntity;

    public function findLoads(Town $from, Town $to, Load $load, int $cost_of_trip): int;

    public function newVehicle(): Vehicle;

    public function newLoad(): Load;

    public function newOffer(): Offer;
}
