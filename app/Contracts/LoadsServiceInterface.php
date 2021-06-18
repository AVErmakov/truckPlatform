<?php

namespace App\Contracts;

use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;

interface LoadsServiceInterface
{
    public function findPath(Town $from, Town $to, Load $load): PathEntity;

    public function findLoads(Town $from, Town $to, Load $load, int $cost_of_trip): int;

    public function newLoad(): Load;
}
