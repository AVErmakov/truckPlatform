<?php

namespace App\Console\Commands;

use App\Contracts\LoadsServiceInterface;
use App\Entities\SearchEntity;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;
use App\Models\VehicleType;
use App\Services\LoadsService;
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
        LoadsServiceInterface $loadsService
    )
    {
        $start = Town::where('id', 1)->first();
        $finish = Town::where('id', 30)->first();

        $vehicleType = new VehicleType();
        $vehicleType->type = 4;
        $weight_able = 20;
        $load = $loadsService->newLoad();
        $searchEntity = $loadsService->createSearchRequest($start, $finish, $vehicleType, $weight_able);
//        echo '$result = ' . $result->sortByDesc('benefit') . PHP_EOL;
        $result = $loadsService->checkLoad($searchEntity, $load);
        echo '$result =' . $result . PHP_EOL;
        return 0;
    }
}
