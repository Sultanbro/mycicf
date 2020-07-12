<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Dicti;
use App\ExpressProduct;
use DB;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateAttributeDicti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attributes:dicti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить аттрибуты';

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
            $products = ExpressProduct::get();
            foreach($products as $product) {
                $kias = new Kias();
                $kias->initSystem();
                $response = $kias->getExpressAttributes($product->product_isn);
                if (isset($response->ROWSET->row)) {
                    foreach ($response->ROWSET->row as $row) {
                        if ((string)$row->NumCode != '') {
                            $childs = (new SiteController())->getDictiList((string)$row->NumCode);
                            if(count($childs) > 0) {
                                $deleteOldDicti = Dicti::where('parent_isn', (string)$row->NumCode)
                                    //->whereDate('created_at','!=', date('Y-m-d'))
                                    ->delete();
                            }

                            foreach ($childs as $child) {
                                if ($child['Value'] != '' && $child['Value'] != null) {
                                    $saveDicti = new Dicti;
                                    $saveDicti->isn = $child['Value'];
                                    $saveDicti->fullname = $child['Label'];
                                    $saveDicti->parent_isn = (string)$row->NumCode;
                                    $saveDicti->parent_name = (string)$row->AttrName;
                                    $saveDicti->code = (string)$row->TypeValue;
                                    $saveDicti->numcode = '';
                                    $saveDicti->save();
                                }
                            }
                        }
                    }
                    echo "Аттрибуты по продукту '".$product->name."' успешно обновлены \n";
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
