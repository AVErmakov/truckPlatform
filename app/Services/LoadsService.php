<?php

namespace App\Services;

use App\Contracts\LoadsServiceInterface;
use App\Entities\LoadEntity;
use App\Entities\PathEntity;
use App\Models\Distance;
use App\Models\Load;
use App\Models\Node;
use App\Models\Offer;
use App\Models\Town;
use App\Models\Vehicle;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoadsService implements LoadsServiceInterface
{

    public function findPath(Town $from, Town $to, Load $load): PathEntity
    {
//        Находим оптимальный маршрут для поездки
//        Пока это просто расстояние из модели Distance
//        $from, $to - это начальные и конечные точки маршрута
//        В $load будет тип груза (и в соответствии с ним надо будет выбрать
//        тип грузовика sortByVehicleType
        // TODO: Implement type of load in Load model

    }

    public function findLoads(Town $from, Town $to, Load $load, int $cost_of_trip): int
    {
//        Находим "эффективность" груза
//        $from, $to - это начальные и конечные точки маршрута
//        $cost_of_trip - параметр себестоимости
        // TODO: Implement settings of searching
//        (стоимость 1км пути и 1 дня работы сотрудника например)
//        В $load есть пункты загрузки и разгрузки
//
        // The collection of loads
        // TODO: Implement sortByVehicleType

//        Sort requires of vehicle's type

        // We have distances between nodes.
        $start = $load->from_town_id;
        $finish = $load->to_town_id;
        $price = $load->price;
        $n1 = $from->id;
        $n2 = $to->id;
        $t1 = Distance::where('town_1_id', $n1)->where('town_2_id', $start)->first()->distance;
        $t2 = Distance::where('town_1_id', $finish)->where('town_2_id', $n2)->first()->distance;
        $t_main = Distance::where('town_1_id', $start)->where('town_2_id', $finish)->first()->distance;

//        echo '$n1 = ' . $n1 . PHP_EOL;
//        echo '$n2 = ' . $n2 . PHP_EOL;
        return $price - ($t1 + $t2 + $t_main) * $cost_of_trip;
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
//  Generate load - $amount - number of loads
//  Weight from 1 to 20 tonn
//  Direction is random
//  The same code is in LoadSeeder
        // TODO: Implement identify field (not increment)
        $num = DB::table('towns')->count();

        $id_town_from = random_int(1, $num);
        $id_town_to = random_int(1, $num);
        $distance = Distance::where('town_1_id', $id_town_from)
            ->where('town_2_id', $id_town_to)->first()->distance;
//            echo 'distance = ' . $distance . PHP_EOL;
        $weight = random_int(1, 20);
        $price = $weight * $distance + 10;
        $load = new Load();
        $load->weight = $weight;
        $load->from_town_id = $id_town_from;
        $load->to_town_id = $id_town_to;
        $load->price = $price;
        DB::table('loads')->insert([
            'weight' => $load->weight,
            'from_town_id' => $load->from_town_id,
            'to_town_id' => $load->to_town_id,
            'price' => $load->price,
        ]);

        return $load;
    }

    public function newOffer(): Offer
    {
        $num_load = DB::table('loads')->count();
        $load = Load::where('id', random_int(1, $num_load))->first();
        $num_vehicle = DB::table('vehicles')->count();
        $vehicle = Vehicle::where('id', random_int(1, $num_vehicle))->first();
        $now = new \DateTime();
        $offer = new Offer();
        $offer->load_id = $load->id;
        $offer->vehicle_id = $vehicle->id;
        $offer->offer_price = $load->price;
        echo 'offer = ' . $offer . PHP_EOL;
        DB::table('offers')->insert([
            'load_id' => $offer->load_id,
            'vehicle_id' => $offer->vehicle_id,
            'offer_price' => $offer->offer_price,
            'offer_time' => $now,
        ]);

        return $offer;
    }

}
