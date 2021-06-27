<?php

namespace App\Services;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\UtillsServiceInterface;
use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Entities\SearchEntity;
use App\Models\Distance;
use App\Models\Load;
use App\Models\LoadType;
use App\Models\Node;
use App\Models\Offer;
use App\Models\SearchSetting;
use App\Models\Town;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class LoadsService implements LoadsServiceInterface
{

    public function findPath(Town $from, Town $to, UtillsServiceInterface $utillsService): PathEntity
    {
//        Находим оптимальный маршрут для поездки
//        Пока это просто расстояние из модели Distance
//        $from, $to - это начальные и конечные точки маршрута
//        В $load будет тип груза (и в соответствии с ним надо будет выбрать
//        тип грузовика sortByVehicleType
        // TODO: Implement type of load in Load model
        $p1 = $from->node()->first();
        $p2 = $to->node()->first();
//        $utillsService = new UtillsService();
        $distance = $utillsService->findDistance($p1, $p2);
        $roads = collect([$p1, $p2]);
        $pathEntity = new PathEntity(
            $roads, $distance
        );
        return $pathEntity;
    }

    public function newSearchRequest($num): Collection
    {
        $result = SearchSetting::factory()->count($num)->create();

//        dd($result);
        return $result;
    }

    public function checkLoadType(SearchSetting $searchSetting, Load $load): bool
    {
        $vehicle_id = $searchSetting->vehicle_id;
        $load_types = Vehicle::find($vehicle_id);
        foreach ($load_types->loadType as $load_type) {
//            echo $load->load_types_id . ' == ' . $load_type->id . PHP_EOL;

            if ($load->load_types_id == $load_type->id) {

                return true;
            };
//            echo '$load_type->id = ' . $load_type->id . PHP_EOL;
//            $loads_list->push($load_type);
        }
        return false;
    }

    public function checkDatePickUp(SearchSetting $searchSetting, Load $load): bool
//    TODO: implements calculating available interval if load_finish <= search_finish
    {
        $start_load = $load->start_loading;

//     $finish_load = $load->finish_loading;
        $start_search = $searchSetting->start_loading;
        $finish_search = $searchSetting->finish_loading;
        $diff_start = strtotime($start_load) - strtotime($start_search);
        $diff_finish = strtotime($start_load) - strtotime($finish_search);
        if ($diff_start >= 0 && $diff_finish <= 0) {
            return true;
        }
        return false;
    }

    public function checkProfit(SearchSetting $searchSetting, Load $load): int
    {
        $finish_search = $searchSetting->to_town_id;
        $finish_load = $load->to_town_id;
        $start_load = $load->from_town_id;

        $distance_1 = $searchSetting->from_town()->first()
            ->distance_from()->where('town_2_id', $start_load)
            ->first()->distance;
        $distance_2 = $load->town_from()->first()
            ->distance_from()->where('town_2_id', $finish_load)
            ->first()->distance;
        $distance_3 = $load->town_to()->first()
            ->distance_from()->where('town_2_id', $finish_search)
            ->first()->distance;

        return $distance_1 + $distance_2 + $distance_3;
    }

    public function singleLoadSearchCheck(SearchSetting $searchSetting, Load $load): int
    {
        //        TODO: implement of validation of all fields checking

        $type_ability = $this->checkLoadType($searchSetting, $load);
        if (!$type_ability) return -1000;
        $date_ability = $this->checkDatePickUp($searchSetting, $load);
        if (!$date_ability) return -1000;
        $profit = $this->checkProfit($searchSetting, $load);
        if ($profit >= 0) return $profit;

//        $loadsList = Load::where()
//        foreach (Load::all() as $item) {
//            $profit = $this->checkLoad($searchEntity, $item);
////            echo '$profit = ' . $profit . PHP_EOL;
//            if ($profit > 0) {
//                $item->profit = $profit;
////                echo '$item = ' . $item . PHP_EOL;
//                $loads_list->push($item);
//            }
//        }
//        echo '$result = ' . $loadsList . PHP_EOL;
//        dd($loads_list);
//        return $loads_list;
    }

    public function checkSearch(SearchSetting $searchSetting): \Illuminate\Support\Collection
    {
        $load_list = collect();
        foreach (Load::all() as $load) {
            $result = $this->singleLoadSearchCheck($searchSetting, $load);
            if ($result >= 0) {
                $load->profit = $result;
                $load_list->push($load);
            }
        }
        dd($load_list);
        return $load_list;
    }

    public function checkLoad(SearchSetting $searchSetting, Load $load): \Illuminate\Support\Collection
    {
        $load_list = collect();
            $result = $this->singleLoadSearchCheck($searchSetting, $load);
            if ($result >= 0) {
                $load->profit = $result;
                $load_list->push($load);
            }
        return $load_list;
    }

    public function newVehicle(): Vehicle
    {
        $num_type = DB::table('vehicle_types')->count();
        $num_home_location = DB::table('towns')->count();

        $type = random_int(1, $num_type);
        $home = random_int(1, $num_home_location);
        $vehicle = new Vehicle();
        $vehicle->vehicle_type_id = $num_type;
        $vehicle->home_location = $num_home_location;
        return $vehicle;
    }

    public function newLoad(): Load
    {
        // TODO: Implement identify field (not increment)
        $load = Load::factory()->create();
        return $load;
    }

}
