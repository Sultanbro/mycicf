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
            $this->updateRegions(123456);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateRegions($isn){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $response = $kias->getRegions($isn);

            if(isset($response->ROWSET->row)) {
                DB::table('regions')->where('parent_isn', $isn)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $region = new Region;
                    $region->isn = (string)$row->ISN;
                    $region->fullname = (string)$row->FULLNAME;
                    $region->code = (string)$row->CODE;
                    $region->numcode = (string)$row->NUMCODE;
                    $region->n_kids = (string)$row->N_KIDS;
                    $region->parent_isn = $isn;
                    $region->save();
                }

                if($type == 'attributes') {
                    $this->updateNkids($isn);
                }
            }
            echo 'Данные по '.$type.' успешно записаны. ';
            return true;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateNkids($parent){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $parents = Dicti::where('parent_isn',$parent)->where('n_kids',1)->get();
            foreach($parents as $parent) {
                $oldDicti = Dicti::where('parent_isn',$parent->isn)->delete();
                try {
                    $child_response = $kias->getDictiList($parent->isn);
                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                }
                if (isset($child_response->ROWSET->row)) {
                    foreach ($child_response->ROWSET->row as $child_row) {
                        $dictiCH = new Dicti;
                        $dictiCH->isn = (string)$child_row->ISN;
                        $dictiCH->fullname = (string)$child_row->FULLNAME;
                        $dictiCH->code = (string)$child_row->CODE;
                        $dictiCH->numcode = (string)$child_row->NUMCODE;
                        $dictiCH->n_kids = (string)$child_row->N_KIDS;
                        $dictiCH->parent_isn = $parent->isn;
                        $dictiCH->parent_name = $parent->fullname . " " . (string)$child_row->FULLNAME;
                        $dictiCH->save();
                    }
                }
            }
            return true;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

}
