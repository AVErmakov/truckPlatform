<?php


namespace App\Contracts;


use App\Entities\PathEntity;
use App\Models\Node;
use App\Models\Town;

interface UtillsServiceInterface
{
    public function mainRoad(Town $from, Town $to, Load $load): PathEntity;

    public function fillNodeTypes(Node $node): int;

    public function findDistance(Node $from, Node $to): int;

//    Fill roades in the table 'roades'
    public function fillRoadTypes(Node $node): int;

}
