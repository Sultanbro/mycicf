<?php

namespace App\Console\Commands;

use DB;
use App\KolesaPrices;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class KolesaPricesFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kolesaprices:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить файл цены колес';

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
     * @return mixed
     */
    public function handle(){
        $result = [];
        foreach (KolesaPrices::all() as $item){
            array_push($result, [
                'mark_id' => $item->mark_id,
                'model_id' => $item->model_id,
                'year' => $item->year,
                'price' => $item->price,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ]);
        }
        $fileName = 'kolesa_prices.txt';
        if(Storage::disk('local')->put("public/$fileName", json_encode($result))){
            echo 'Файл успешно обновлен';
        }
    }
}
