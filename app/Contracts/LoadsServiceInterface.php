<?php

namespace App\Contracts;

use App\Entities\PathEntity;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;

interface LoadsServiceInterface
{
    public function findPath(Node $from, Node $to, Load $load): PathEntity;

    public function findDistance(Node $from, Node $to): int;
}
