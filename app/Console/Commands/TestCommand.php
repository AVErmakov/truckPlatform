<?php

namespace App\Console\Commands;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\OffersServiceInterface;
use App\Contracts\UtillsServiceInterface;
use App\Contracts\VehiclesServiceInterface;
use App\Entities\SearchEntity;
use App\Models\Load;
use App\Models\LoadType;
use App\Models\Node;
use App\Models\SearchSetting;
use App\Models\Town;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Services\LoadsService;
use Database\Factories\LoadTypeVehicleFactory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commandi:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(
        LoadsServiceInterface $loadsService,
        OffersServiceInterface $offersService,
        VehiclesServiceInterface $vehiclesService,
    )
    {
//        $loadsService->newSearchRequest(1);

//        $searchDate = new \DateTime(SearchSetting::first()->start_loading);
//        $searchSettings = SearchSetting::first();
//        $load = Load::where('id', 47)->first();
//        $load = $loadsService->newLoad();
        $vehicle = $vehiclesService->newVehicle(1);
        echo $vehicle . PHP_EOL;
//        dd($loadsService->checkLoad($searchSettings, $load));

        return 0;
    }
}
