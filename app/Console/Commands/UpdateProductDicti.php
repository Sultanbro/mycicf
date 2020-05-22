<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\ProductsDicti;
use DB;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateProductDicti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:dicti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить аттрибуты и оговорки и ограничения для конструктора';

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
            if($this->updateProductsDicti(220169,'attributes')){
                $this->updateProductsDicti(2031,'agrclauses');
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateProductsDicti($isn, $type){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $response = $kias->getDictiList($isn);

            if(isset($response->ROWSET->row)) {
                $oldDicti = ProductsDicti::where('parent_isn',$isn)->delete();
                $childIsns = [];
                DB::table('products_dicti')->where('parent_isn', $isn)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new ProductsDicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = $isn;
                    $dicti->save();
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
            $parents = ProductsDicti::where('parent_isn',$parent)->where('n_kids',1)->get();
            foreach($parents as $parent) {
                $oldDicti = ProductsDicti::where('parent_isn',$parent->isn)->delete();
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
                        $dictiCH = new ProductsDicti;
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
