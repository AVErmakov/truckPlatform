<?php


namespace App\Services;

use App\Contracts\UtillsServiceInterface;
use App\Entities\PathEntity;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;

class UtillsService implements UtillsServiceInterface
{
    //    Return the route & distance for two points (towns)
//    Use method priorities of highways

    public function mainRoad(Town $from, Town $to, Load|\App\Contracts\Load $load): PathEntity {

    }

//    Fill node_types in the table 'nodes'
    public function fillNodeTypes(Node $node): int {
        $id = $node->first()->id;
        if (( $id>= 12 && $id <=19) || ( $id>= 32 && $id <=39)) {
            return 1;
        }
        return 3;
    }

    public function findDistance(Node $from, Node $to): int
    {
// The shortist path
// We have matrix 5х10 of nodes. Every node connects with neigbours at right angles
        $point_a = $from->id - 1;
        $point_b = $to->id - 1;
        $result = (abs($point_a % 10 - $point_b % 10) +
            abs(intdiv($point_a, 10) - intdiv($point_b, 10))) * 50;
//        echo '$result = ' . $result . PHP_EOL;
        return $result;
    }

    public function fillRoadTypes(Node $node): int
    {
        // TODO: Implement fillRoadTypes() method.
    }
}
