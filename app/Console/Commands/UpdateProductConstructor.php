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
    protected $signature = 'update:fullConstructor';

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
    public function handle(){
        try{
            $constructors = FullConstructor::get();
            foreach($constructors as $constructor){
                $data = json_decode($constructor->data);
                $dataobjects = isset($data->agrobjects) ? $data->agrobjects : [];
                $agrobjects = $this->updateAgrobject($constructor,$dataobjects,$constructor->product->name);
                $agrclauses = $this->updateAgrclause($data,$constructor->product->name);
                $attributes = $this->updateAgrattribute($data,$constructor->product->name);

                if(count($agrobjects) > 0 && count($agrclauses) > 0 && count($attributes) > 0) {
                    $newconstructor = FullConstructor::where('product_isn',$constructor->product_isn)->first();
                    $newconstructor->data = json_encode(array(
                        'agrobjects' => $agrobjects,
                        'participants' => $data->participants,
                        'attributes' => $attributes,
                        'agrclauses' => $agrclauses,
                        'formular' => $data->formular,
                    ));
                    try{
                        if($newconstructor->update()){
                            echo "Конструктор продукта ".$constructor->product->name." успешно обновлен\n";
                        }
                    }catch (\Exception $ex){
                        throw new \Exception($ex->getMessage());
                    }
                } else {
                    echo "Ошибка обновления конструктора продукта - ".$constructor->product->name."\n";
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function updateAgrobject($constructor,$objects,$product_name){
        $kias = app(KiasServiceInterface::class);
        $kias->initSystem();
        $response = $kias->getFullObject($constructor->product_isn);

        if (isset($response->error)) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->fulltext
            ]);
        }

        $objects = $objects;
        $checkResponse = 0;
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
                    if($subIsn != null && $subIsn != '') {      // Если тип объекта есть
                        $objects['objekt'][$isn]['obj'][$i]['SubClassISN'] = $subIsn;
                        $objects['objekt'][$isn]['obj'][$i]['ObjName'] = (string)$object->subclassobjname;
                    } else {
//                            if($isn == 2118){       // Если класс автотранспорт
//                                $dicti = $kias->getDictiList($isn);
//                                if(isset($dicti->ROWSET->row)){
//                                    foreach ($dicti->ROWSET->row as $dictiRow){
//                                        $objects['objekt'][$isn]['obj'][$i]['SubClassISN'] = (string)$dictiRow->ISN;
//                                        $objects['objekt'][$isn]['obj'][$i]['ObjName'] = (string)$dictiRow->FULLNAME;
//                                    }
//                                }
//                            } else {
                        $objects['objekt'][$isn]['obj'] = [];
                        $objects['objekt'][$isn]['obj'] = [];
                        //}
                    }

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
                                'Childs' => (string)$row->NumCode != '' && (string)$row->NumCode != null ? (new SiteController())->getDictiList((string)$row->NumCode) : [],
                                'Required' => (string)$row->Required,
                                'ReadOnly' => (string)$row->ReadOnly,
                            );
                        }
                    }

                    if($isn == 2118) {
                        $objects['objekt'][$isn]['AGROBJCAR'][0] = [
                            'ExtSystemKey' => '',
                            'ModelISN' => '',
                            'MarkaISN' => '',
                            'ClassISN' => '',
                            'ReleaseDate' => '',
                            'VIN' => '',
                            'REGNO' => '',
                            'OwnerJuridical' => 'N',
                            'GRNZ' => '',
                            'SRTSNUM' =>  '',
                            'SRTSDATE' => '',
                            'CountryISN' => '',
                            'TerritoryISN' => '',
                            'PROBEG' => '',
                            'REALPRICE' => ''
                        ];
                    }

                    if (isset($response->RiskPack->row)) {
                        foreach ($response->RiskPack->row as $row) {
                            if(isset($row->FranchSum->row)){
                                $objects['objekt'][$isn]['FRANCH'][(string)$row->RiskPackisn]['franchSum'] = [];
                                foreach ($row->FranchSum->row as $franch) {
                                    if((string)$franch->Franch != '' && (string)$franch->Franch != null) {
                                        array_push($objects['objekt'][$isn]['FRANCH'][(string)$row->RiskPackisn]['franchSum'], [
                                            'Franch' => (string)$franch->Franch,
                                            'KZT' => (string)$franch->KZT,
                                            'USD' => (string)$franch->USD,
                                            'EUR' => (string)$franch->EUR,
                                            'OTHER' => (string)$franch->OTHER
                                        ]);
                                    }
                                }
                            }
                            if(isset($row->FranchProc->row)){
                                $objects['objekt'][$isn]['FRANCH'][(string)$row->RiskPackisn]['franchProc'] = [];
                                $check = '';
                                foreach ($row->FranchProc->row as $franchP) {
                                    if((string)$franchP->uFranchProc != '' && (string)$franchP->uFranchProc != null || (string)$franchP->cFranchProc != '' && (string)$franchP->cFranchProc != null) {
                                        array_push($objects['objekt'][$isn]['FRANCH'][(string)$row->RiskPackisn]['franchProc'], [
                                            'uFranchProc' => (string)$franchP->uFranchProc == ',5' ? '0,5' : (string)$franchP->uFranchProc,
                                            'cFranchProc ' => (string)$franchP->cFranchProc == ',5' ? '0,5' : (string)$franchP->cFranchProc
                                        ]);
                                    }
                                }
                            }

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
                $checkResponse = 1;
            }
        }
        if($checkResponse == 1){
            echo "Данные объекта получены (".$product_name.")\n";
        }
        return $objects;
    }

    public function updateAgrclause($data,$product_name){
        if(isset($data->agrclauses)){
            $agrclauses = $data->agrclauses;
            $checkResponse = 0;
            foreach($agrclauses as $key => $agrclause){
                if(isset($agrclause->ISN)) {
                    if ($agrclause->Type == 'DICTI' || $agrclause->N_Kids == 1) {
                        $isn = $agrclause->NumCode != '' && $agrclause->NumCode != null ? $agrclause->NumCode : $agrclause->ISN;
                        $agrclauses[$key]->Childs = (new ProductsController())->getDictiKias($isn, '');
                        $checkResponse = 1;
                    }
                }
            }
            if($checkResponse == 1){
                echo "Данные оговорок и ограничений получены (".$product_name.")\n";
            }
            return $agrclauses;
        }
    }

    public function updateAgrattribute($data,$product_name){
        if(isset($data->attributes)){
            $attributes = $data->attributes;
            $checkResponse = 0;
            foreach($attributes as $key => $attribute){
                if(isset($attribute->ISN)) {
                    if ($attribute->Type == 'DICTI' || isset($attribute->N_Kids) && $attribute->N_Kids == 1) {
                        $isn = isset($attribute->NumCode) && $attribute->NumCode != '' ? $attribute->NumCode : $attribute->ISN;
                        $attributes[$key]->Childs = (new ProductsController())->getDictiKias($isn, 'attributes');
                        $checkResponse = 1;
                    }
                }
            }
            if($checkResponse == 1){
                echo "Данные атрибутов получены (".$product_name.")\n";
            }
            return $attributes;
        }
    }

}
