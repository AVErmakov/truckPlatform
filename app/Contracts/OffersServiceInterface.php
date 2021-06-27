<?php

namespace App\Contracts;

use App\Models\Offer;

interface OffersServiceInterface
{
    public function newOffer(): Offer;
}
