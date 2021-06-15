<?php

namespace App\Services;

use App\Contracts\LoadsServiceInterface;
use App\Entities\PathEntity;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;

class LoadsService implements LoadsServiceInterface
{

    public function findPath(Node $from, Node $to, Load $load): PathEntity
    {
        // TODO: Implement findPath() method.
// The shortist path
// We have matrix 5х10 of nodes. Every node connects with neigbours at right angles
        $path = new PathEntity(500);
        echo $path->distance . PHP_EOL;
        return $path;
    }

    public function findDistance(Node $from, Node $to): int
    {
        // TODO: Implement findPath() method.
// The shortist path
// We have matrix 5х10 of nodes. Every node connects with neigbours at right angles
        $point_a = $from->id - 1;
        $point_b = $to->id - 1;
        $result = abs($point_a % 10 - $point_b % 10) +
            abs(intdiv($point_a, 10) - intdiv($point_b, 10));
//        echo '$result = ' . $result . PHP_EOL;
        return $result;
    }
}
