<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Dicti;
use DB;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateColorDicti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'color:dicti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить цвета';

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
            if($this->updateColorDicti(2028)){
                $this->updateColorDicti(2118);
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateColorDicti($isn){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $response = $kias->getDictiList($isn);

            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',$isn)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = $isn;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
            return true;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
