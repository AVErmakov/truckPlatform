<?php

namespace App\Contracts;

use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Entities\SearchEntity;
use App\Models\Load;
use App\Models\Offer;
use App\Models\SearchSetting;
use App\Models\Town;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Services\UtillsService;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

interface LoadsServiceInterface
{
    public function findPath(Town $from, Town $to, UtillsServiceInterface $utillsService): PathEntity;

    public function newSearchRequest(int $num): \Illuminate\Database\Eloquent\Collection;

    public function checkLoadType(SearchSetting $searchSetting, Load $load): bool;

    public function checkDatePickUp(SearchSetting $searchSetting, Load $load): bool;

    public function checkProfit(SearchSetting $searchSetting, Load $load): int;

    public function singleLoadSearchCheck(SearchSetting $searchSetting, Load $load): int;

    public function checkSearch(SearchSetting $searchSetting): Collection;

    public function checkLoad(SearchSetting $searchSetting, Load $load): Collection;

    public function newVehicle(): Vehicle;

    public function newLoad(): Load;
}
