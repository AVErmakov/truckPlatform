<?php

namespace App\Entities;

use App\Models\Town;
use App\Models\VehicleType;
use Illuminate\Support\Collection;

class SearchEntity
{
    public function __construct(
//        TODO: add time & date
        public Town $start,
        public Town $finish,
        public Vehicle $vehicle,
        public int $weight_able,
    )
    {
    }
}
