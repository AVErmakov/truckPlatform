<?php

namespace App\Services;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\OffersServiceInterface;
use App\Models\Load;
use App\Models\Offer;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class OffersService implements OffersServiceInterface
{

    public function newOffer(): Offer
    {
        $offer = Offer::factory()->create();
//        dd($offer);
        return $offer;
    }

}
