<?php

namespace App\Contracts;

use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Entities\SearchEntity;
use App\Models\Load;
use App\Models\Offer;
use App\Models\Town;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Services\UtillsService;

interface LoadsServiceInterface
{
    public function findPath(Town $from, Town $to): PathEntity;

    public function findLoads(Town $from, Town $to, Load $load, int $cost_of_trip): int;

    public function createSearchRequest(Town $start,
                                        Town $finish,
                                        VehicleType $vehicleType,
                                        int $weight_able): SearchEntity;

    public function checkLoad(SearchEntity $searchEntity, Load $load): int;

    public function newVehicle(): Vehicle;

    public function newLoad(): Load;

    public function newOffer(): Offer;
}
