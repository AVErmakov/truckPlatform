<?php

namespace App\Entities;

use Illuminate\Support\Collection;

class PathEntity
{
    public function __construct(
        // SPISOK DOROG
//        public Collection $roads,

        public int $distance,
    )
    {
    }
}
