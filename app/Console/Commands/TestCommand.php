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
        LoadsServiceInterface $loadsService
    )
    {

//        echo '$result = ' . $result->sortByDesc('benefit') . PHP_EOL;
        $result = $loadsService->newLoad();
echo '$result =' . $result . PHP_EOL;

        return 0;
    }
}
