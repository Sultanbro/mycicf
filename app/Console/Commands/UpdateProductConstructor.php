<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class UpdateProductConstructor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'full:constructor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить данные конструктора полных котировок';

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
        $kias->initSystem();
        try{
            $constructors = FullConstructor::get();
            foreach($constructors as $constructor){
                $data = json_decode($constructor->data);
                $dataobjects = isset($data->agrobjects) ? $data->agrobjects : [];
                $agrobjects = $this->updateAgrobject($constructor,$dataobjects,$kias);
                $agrclauses = $this->updateAgrclause($data);
                $attributes = $this->updateAgrattribute($data);

                if(count($agrobjects) > 0 && count($agrclauses) > 0 && count($attributes) > 0) {
                    $newconstructor = FullConstructor::where('product_isn',$constructor->product_isn)->first();
                    $newconstructor->data = json_encode(array(
                        'agrobjects' => $agrobjects,
                        'participants' => $data->participants,
                        'attributes' => $agrclauses,
                        'agrclauses' => $attributes,
                        'formular' => $data->formular,
                    ));
                    try{
                        if($newconstructor->update()){
                            echo 'Конструктор продукта '.$constructor->product->name.' успешно обновлен';
                        }
                    }catch (\Exception $ex){
                        throw new \Exception($ex->getMessage());
                    }
                } else {
                    echo 'Ошибка обновления конструктора продукта - '.$constructor->product->name;
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateAgrobject($constructor,$objects,$kias){
        $response = $kias->getFullObject($constructor->product_isn);
        $objects = $objects;
        if(isset($response)){
            if (isset($response->Object->row)) {
                $objects = [];
                $objects['ClassISN'] = '';
                $objects['SubClassISN'] = '';
                $objects['ObjName'] = '';
                $objects['RiskISN'] = '';
                $objects['InsClassISN'] = '';
                $objects['insureSum'] = '';
                $objects['DAsum'] = null;
                $i = 0;
                foreach($response->Object->row as $object) {
                    $isn = (string)$object->classobjisn;
                    $subIsn = (string)$object->subclassobjisn;
                    $objects['objekt'][$isn]['ClassISN'] = (string)$object->classobjisn;
                    $objects['objekt'][$isn]['classobjname'] = (string)$object->classobjname;
                    $objects['objekt'][$isn]['Value'] = '';
                    $objects['objekt'][$isn]['SubjISN'] = '';
                    $objects['objekt'][$isn]['obj'][$i]['SubClassISN'] = $subIsn;
                    $objects['objekt'][$isn]['obj'][$i]['ObjName'] = (string)$object->subclassobjname;
                    $objects['objekt'][$isn]['AGROBJECT_ADDATTR'] = [];
                    $objects['objekt'][$isn]['AGROBJCAR'] = [];
                    $objects['objekt'][$isn]['AGRCOND'][$isn.$subIsn] = [];
                    if (isset($object->ObjAttr->row)) {
                        foreach ($object->ObjAttr->row as $row) {
                            $objects['objekt'][$isn]['AGROBJECT_ADDATTR'][(string)$row->AttrISN] = array(
                                'AttrISN' => (string)$row->AttrISN,
                                'Type' => (string)$row->TypeValue,
                                'Label' => (string)$row->AttrName,
                                'ParentISN' => (string)$row->NumCode,
                                'Value' => null,
                                'Remark' => null,
                                'Childs' => (new SiteController())->getDictiList((string)$row->NumCode)
                            );
                        }
                    }

                    if($isn == 2118) {
                        $objects['objekt'][$isn]['AGROBJCAR'][0] = [
                            'ModelISN' => '',
                            'MarkaISN' => '',
                            'ClassISN' => '',
                            'ReleaseDate' => '',
                            'VIN' => '',
                            'REGNO' => '',
                            'OwnerJuridical' => 'N',
                            'TerritoryISN' => '',
                            'PROBEG' => '',
                            'REALPRICE' => ''
                        ];
                    }

                    if (isset($response->RiskPack->row)) {
                        foreach ($response->RiskPack->row as $row) {
                            if($row->ClassObjISN == '' || $row->ClassObjISN == null){
                                array_push($objects['objekt'][$isn]['AGRCOND'][$isn.$subIsn], [
                                    'InsClassisn' => (string)$row->InsClassisn,
                                    'InsClassname' => (string)$row->InsClassname,
                                    'RiskPackisn' => (string)$row->RiskPackisn,
                                    'RiskPackname' => (string)$row->RiskPackname,
                                ]);
                            } else {
                                if ($row->SubClassObjISN == $subIsn && $row->ClassObjISN == $isn) {
                                    array_push($objects['objekt'][$isn]['AGRCOND'][$isn.$subIsn], [
                                        'InsClassisn' => (string)$row->InsClassisn,
                                        'InsClassname' => (string)$row->InsClassname,
                                        'RiskPackisn' => (string)$row->RiskPackisn,
                                        'RiskPackname' => (string)$row->RiskPackname,
                                    ]);
                                }
                            }
                        }
                    }
                    $i++;
                }

            }
        }
        return $objects;
    }

    public function updateAgrclause($data){
        if(isset($data->agrclauses)){
            $agrclauses = $data->agrclauses;
            foreach($agrclauses as $key => $agrclause){
                if(isset($agrclause->ISN)) {
                    if ($agrclause->Type == 'DICTI' || $agrclause->N_Kids == 1) {
                        $isn = $agrclause->NumCode != '' && $agrclause->NumCode != null ? $agrclause->NumCode : $agrclause->ISN;
                        $agrclauses[$key]->Childs = (new ProductsController())->getDictis($isn, '');
                    }
                }
            }
            return $agrclauses;
        }
    }

    public function updateAgrattribute($data){
        if(isset($data->attributes)){
            $attributes = $data->attributes;
            foreach($attributes as $key => $attribute){
                if(isset($attribute->ISN)) {
                    if ($attribute->Type == 'DICTI' || isset($attribute->N_Kids) && $attribute->N_Kids == 1) {
                        $isn = isset($attribute->NumCode) && $attribute->NumCode != '' ? $attribute->NumCode : $attribute->ISN;
                        $attributes[$key]->Childs = (new ProductsController())->getDictis($isn, 'attributes');
                    }
                }
            }
            return $attributes;
        }
    }

}
