<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Region;
use DB;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateRegions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:regions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить регионы';

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
            $regions = $this->updateRegions(0);
            if(count($regions) > 0){
                $this->updateChilds($regions);
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateRegions($isn){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $response = $kias->getRegions($isn);

            $parent_isns = [];
            if(isset($response->rowset->row)) {
                DB::table('regions')->where('parent_isn', $isn)->delete();
                foreach ($response->rowset->row as $row) {
                    $region = new Region;
                    $region->isn = (string)$row->isn;
                    $region->fullname = (string)$row->name;
                    $region->code = (string)$row->CODE;
                    $region->numcode = (string)$row->NUMCODE;
                    $region->n_kids = (string)$row->N_KIDS;
                    $region->parent_isn = $isn;
                    if($region->save()){
                        array_push($parent_isns,(string)$row->ISN);
                        echo 'Данные по '.(string)$row->FULLNAME.' успешно записаны. ';
                    } else {
                        echo 'Ошибка записи '.(string)$row->FULLNAME.' ';
                    }
                }
            }
            return $parent_isns;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateChilds($parents){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $parent_isns = [];
            foreach($parents as $parent) {
                $oldDicti = Region::where('parent_isn',$parent)->delete();
                try {
                    $child_response = $kias->getRegions($parent);
                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                }
                if (isset($child_response->ROWSET->row)) {
                    foreach ($child_response->ROWSET->row as $child_row) {
                        $dictiCH = new Region;
                        $dictiCH->isn = (string)$child_row->ISN;
                        $dictiCH->fullname = (string)$child_row->FULLNAME;
                        $dictiCH->code = (string)$child_row->CODE;
                        $dictiCH->numcode = (string)$child_row->NUMCODE;
                        $dictiCH->n_kids = (string)$child_row->N_KIDS;
                        $dictiCH->parent_isn = $parent->isn;
                        $dictiCH->parent_name = $parent->fullname . " " . (string)$child_row->FULLNAME;
                        if($dictiCH->save()){
                            array_push($parent_isns,(string)$child_row->ISN);
                            echo 'Данные по '.(string)$child_row->FULLNAME.' успешно записаны. ';
                        } else {
                            echo 'Ошибка записи '.(string)$child_row->FULLNAME.' ';
                        }
                    }
                }
            }
            return $parent_isns;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

}
