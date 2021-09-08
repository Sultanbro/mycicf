<?php

namespace App\Console\Commands;

use App\Dicti;
use App\ExpressProduct;
use DB;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class GetDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить список СЗ и Заявлении';

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
    public function handle(KiasServiceInterface $kias){

        $kias->authBySystem();

        try{
            $response = $kias->getDictiList(800701);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',800701)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 800701;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1760341);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1760341)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1760341;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1760331);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1760331)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1760331;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1007381);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1007381)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1007381;
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
