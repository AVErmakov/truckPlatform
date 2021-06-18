<?php

namespace App\Console\Commands;

use App\Contracts\LoadsServiceInterface;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;
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
//        Load $load
        LoadsServiceInterface $loadsService
    )
    {
//        $result = collect();
//        $n1 = Town::where('id', 1)->first();
//        $n2 = Town::where('id', 30)->first();
//        foreach (Load::all() as $item) {
//            $benefit = $loadsService->findLoads($n1, $n2, $item, 5);
//            if ($benefit > 0) {
//                $item->benefit = $benefit;
//                $result->push($item);
//            }
//        }
//        echo '$result = ' . $result->sortByDesc('benefit') . PHP_EOL;
        $result = $loadsService->newLoad();
echo '$result =' . $result . PHP_EOL;
//        DB::table('loads')->insert(
//        $result);

        return 0;
    }
}
