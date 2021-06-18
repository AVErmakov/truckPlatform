<?php

namespace App\Entities;

use Illuminate\Support\Collection;

class LoadEntity
{
    public function __construct(
        // SPISOK DOSTUPNYH GRUZOV
        public Collection $loadsList,
    )
    {
    }
}
