<?php

namespace App\Console\Commands;

use App\Dicti;
use DB;
use App\Http\Controllers\StatisticsController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateStatisticsDicti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistic:dicti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить значения статистики ДА';

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
        try{
            $kias = new Kias();
            $kias->initSystem();
            $result = $kias->getDictiProducts(13);
            if(isset($result->ROWSET->row)) {
                foreach ($result->ROWSET->row as $row) {
                    if(($checkDicti = Dicti::where('isn', $row['ISN'])->first()) === null){
                        $checkDicti = new Dicti();
                    }
                    $checkDicti = new Dicti();
                    $checkDicti->isn = (string)$row->ISN;
                    $checkDicti->fullname = (string)$row->FULLNAME;
                    $checkDicti->parent_isn = (string)$row->PARENTISN;
                    $checkDicti->parent_name = "";
                    $checkDicti->condition_for_property = 'N';
                    $checkDicti->type = 'insurance_products';
                    $checkDicti->code = '';
                    $checkDicti->numcode = '';
                    $checkDicti->n_kids = (int)$row->N_KIDS;
                    $checkDicti->save();
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
