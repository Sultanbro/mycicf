<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Region;
use App\City;
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
                $cities = $this->updateCities($regions);
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

            $isns = [];
            if(isset($response->rowset->row)) {
                DB::table('regions')->delete();
                foreach ($response->rowset->row as $row) {
                    $name = (string)$row->isn == ('1973' ? 'Временный въезд' : (string)$row->isn == '1974') ? 'Временная регистрация' : '';
                        $region = new Region;
                    $region->isn = (string)$row->isn;
                    $region->name = (string)$row->name == '' ? $name : (string)$row->name;
                    $region->parentisn = (string)$row->parentisn;
                    $region->parentname = '';
                    $region->regionisn = (string)$row->parentisn;
                    if($region->save()){
                        ///if((string)$row->parentisn != 0){
                            array_push($isns,
                                [
                                    'isn' => (string)$row->isn,
                                    'name' => (string)$row->name
                                ]);
                        //}
                        echo "Данные по ".$row->name." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".$row->name." \n";
                        return false;
                    }
                }
                //echo "Данные по регионам успешно записаны. \n";
            } else {
                return 'Ошибка.'.(string)$response->error->text;
            }
            return $isns;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateCities($parents){
        try{
            $kias = new Kias();
            $kias->initSystem();
            $isns = [];
            foreach($parents as $parent) {
                $oldDicti = City::where('parentisn', $parent['isn'])->delete();
                try {
                    $child_response = $kias->getRegions($parent['isn']);
                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'error' => $e->getMessage()
                    ]);
                }
                if (isset($child_response->rowset->row)) {
                    foreach ($child_response->rowset->row as $child_row) {
                        $dictiCH = new City;
                        $dictiCH->isn = (string)$child_row->isn;
                        $dictiCH->name = (string)$child_row->name;
                        $dictiCH->parentisn = (string)$child_row->parentisn == '' ? $parent['isn'] : (string)$child_row->parentisn;
                        $dictiCH->parentname = $parent['name'];
                        $dictiCH->regionisn = (string)$child_row->parentisn;
                        if($dictiCH->save()){
                            array_push($isns,[
                                'isn' => (string)$child_row->isn,
                                'name' => (string)$child_row->name
                            ]);
                            //echo "Данные по ".$child_row->name." успешно записаны. \n";
                        } else {
                            echo "Ошибка записи ".$child_row->name." \n";
                            return false;
                        }
                    }
                    echo "Города по региону ".$parent['name']." успешно записаны\n";
                } else {
                    return 'Ошибка.'.(string)$child_response->error->text;
                }
            }
            return $isns;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

}
