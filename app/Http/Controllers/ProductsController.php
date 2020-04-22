<?php

namespace App\Http\Controllers;

use App\ExpressProduct;
use App\FullProduct;
use App\FullQuotation;
use App\FullConstructor;
use App\InsProduct;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index($id = 1){
        $data = InsProduct::findOrFail($id);
        $consturction = json_decode($data->construction);
        return view('product', compact('data'), compact('consturction'));
    }

    public function express($ID){
        if(($data = ExpressProduct::find($ID)) === null){
            abort(404, 'Такой продукт не найден');
        }
        return view('express.create', compact('ID'));
    }

    // Admin routes

    public function createExpress(){
        return view('products.create.express');
    }

    public function listExpress(){
        return view('products.list.express');
    }

    public function getExpressList(Request $request){
        $result = [];
        foreach(ExpressProduct::all() as $data){
            array_push($result, [
                'id' => $data->id,
                'name' => $data->name,
                'isn' => $data->products_isn,
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function setExpressData(Request $request){
        try{
            $model = new ExpressProduct();
            $model->name = $request->name;
            $model->product_isn = $request->product_isn;
            $model->save();
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'error' => $ex->getMessage()
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function createFullQuotation(){
        return view('products.create.full');
    }

    public function listFullQuotation(){
        return view('products.list.full');
    }

    public function getFullQuotationList(Request $request){
        $result = [];
        foreach(FullProduct::all() as $data){
            array_push($result, [
                'id' => $data->id,
                'name' => $data->name,
                'isn' => $data->products_isn,
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function createFullProduct(Request $request){
        try{
            $model = new FullProduct();
            $model->name = $request->name;
            $model->product_isn = $request->product_isn;
            $model->save();
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'error' => $ex->getMessage()
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function getFullConstructor ($id){
        $product = FullProduct::find($id);
        $constructor = FullConstructor::where('product_id',$id)->first();
        $sections = isset($constructor->data) ? json_decode($constructor->data) : [];
        $parentisns = isset($constructor->parentisns) ? json_decode($constructor->parentisns) : (object)[];

        $data['participants'] = isset($sections->participants) ? $sections->participants : [];
        //$data['objects'] = isset($constructor->objects) ? $constructor->objects : [];
        $data['attributes'] = isset($sections->attributes) ? $sections->attributes : [];
        $data['agrclause'] = isset($sections->agrclause) ? $sections->agrclause : [];
        $data['formular'] = isset($sections->formular) ? $sections->formular : [];
        return view('products.create.full_constructor',compact(['product','data','parentisns']));
    }

    public function setFullConstructor(Request $request){
        try{
            $constructor = FullConstructor::where('product_id',$request->id)->first() ?? new FullConstructor();
            $constructor->product_id = $request->id;
            $constructor->product_isn = $request->product_isn;
            $constructor->user_isn = Auth::user()->ISN;

            $constructor->data = json_encode(array(
                'participants' => $request->participants,
                //'objects' => $request->objects,
                'attributes' => $request->all()['attributes'],
                'agrclause' => $request->agrclause,
                'formular' => $request->formular,
            ));
            $constructor->parentisns = json_encode($request->parentisns);
            $constructor->save();
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'error' => $ex->getMessage()
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function getDicti(Request $request){
        try{
            $result = $this->getDictis((string)$request->ISN,$request->type);
            return response()->json([
                'success' => true,
                'result' => $result
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'error' => $ex->getMessage()
            ]);
        }
    }

    // End Admin routes






    public function expressList(){
        $products = [];
        foreach (ExpressProduct::all() as $product){
            array_push($products, [
                'url' => "/express/calc/{$product->id}",
                'name' => $product->name,
            ]);
        }
        return view('express.list', compact('products'));
    }

    public function getExpressAttributes(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $ProductISN = ExpressProduct::find($ID)->product_isn;
        $response = $kias->getExpressAttributes($ProductISN);
        $attributes = [];
        if(isset($response->ROWSET->row)){
            foreach ($response->ROWSET->row as $row){
                //array_push($attributes, [
                $attributes[(string)$row->AttrISN] = array(
                    'AttrISN' => (string)$row->AttrISN,
                    'Type' => (string)$row->TypeValue,
                    'Label' => (string)$row->AttrName,
                    'ParentISN' => (string)$row->NumCode,
                    'Value' => null,
                    'Remark' => null,
                    'Childs' => (new SiteController())->getDictiList((string)$row->NumCode)
                );
                //]);
            }
        }
        return response()->json([
            'success' => true,
            'attributes' => $attributes
        ]);
    }

    public function expressCalc(Request $request, KiasServiceInterface $kias){
        $product_id = $request->id;
        if(($model = ExpressProduct::find($product_id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }

        $prodIsn = $model->product_isn;
        $subjISN = $request->subjISN;
        $attributes = $this->attributesToKiasAddAttr($request->all()['attributes']);

        $response = $kias->expressCalculator($prodIsn, $subjISN, $attributes);
        if(isset($response->error)){
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text
            ]);
        }

        return response()->json([
            'success' => true,
            'premium' => (int)$response->ROWSET->row->Premiumsum
        ]);
    }

    public function fullList(){
        $products = [];
        foreach (FullProduct::all() as $product){
            array_push($products, [
                'url' => "/full-quotation/calc/{$product->id}/0",
                'name' => $product->name,
            ]);
        }
        return view('fullquotation.list', compact('products'));
    }

    public function fullCreate(Request $request){
        if(($model = FullProduct::find($request->id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }

        $fullQuotation = FullQuotation::create([
            'product_isn' => $model->product_isn,
            'user_isn' => Auth::user()->ISN,
            'subj_isn' => $request->subjISN,
            'attributes' => json_encode($request['attributes'])
        ]);

        return response()->json([
            'success' => true,
            'id' => $fullQuotation->id
        ]);
    }

    public function full($ID,$quotationId,Request $request){
        if(($model = FullProduct::find($ID)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }
        $productName = $model->name;

        return view('fullquotation.create', compact(['ID','quotationId','productName']));
    }

    /*public function getFullAttributes(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $constructor = FullConstructor::select('data')->where('product_id',$ID)->first();
        $data = isset($constructor->data) ? json_decode($constructor->data) : [];

        $attributes = [];
        if(isset($data->attributes)) {
            $attributes = $data->attributes;
        }

        return response()->json([
            'success' => true,
            'attributes' => $attributes
        ]);
    }

    public function getFullParticipants(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $constructor = FullConstructor::select('data')->where('product_id',$ID)->first();
        $data = isset($constructor->data) ? json_decode($constructor->data) : [];

        $participants = [];
        if(isset($data->participants)) {
            $participants = $data->participants;
        }

        return response()->json([
            'success' => true,
            'participants' => $participants
        ]);
    }

    public function getFullAgrclause(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $constructor = FullConstructor::select('data')->where('product_id',$ID)->first();
        $data = isset($constructor->data) ? json_decode($constructor->data) : [];

        $agrclause = [];
        if(isset($data->agrclause)) {
            $agrclause = $data->agrclause;
        }

        return response()->json([
            'success' => true,
            'agrclauses' => $agrclause
        ]);
    }*/

    public function getFullData(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $constructor = FullConstructor::select('data')->where('product_id',$ID)->first();
        $data = isset($constructor->data) ? json_decode($constructor->data) : [];

        $participants = isset($data->participants) ? $data->participants : [];
        $agrclause = isset($data->agrclause) ? $data->agrclause : [];
        $attributes = isset($data->attributes) ? $data->attributes : [];
        $formular = isset($data->formular) ? $data->formular[0] : [];

        return response()->json([
            'success' => true,
            'participants' => $participants,
            'agrclauses' => $agrclause,
            'attributes' => $attributes,
            'formular' => $formular
        ]);
    }

    public function getFullObjects(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $constructor = FullProduct::find($ID);
        $responses = $kias->getFullObject($constructor->product_isn);
        $objects = [];
        $risks = [];    //RiskPack
        $ageclause = [];
        //print '<pre>';print_r($responses);print '</pre>';exit();



        if(isset($responses)){
            foreach($responses as $response) {
                $risks = 0;
                if (isset($response->Object->row)) {
                    //$object = $response->Object->row;
                    $objects['ClassISN'] = (string)$response->Object->row->classobjisn;
                    $objects['classobjname'] = (string)$response->Object->row->classobjname;
                    $objects['Value'] = '';
                    $i = 0;
                    foreach($response->Object->row as $object) {
                        $subIsn = (string)$object->subclassobjisn;
                        $objects['obj'][$i]['SubClassISN'] = $subIsn;
                        $objects['obj'][$i]['ObjName'] = (string)$object->subclassobjname;
                        $objects['AGROBJECT_ADDATTR'][$subIsn] = [];
                        $objects['AGRCOND'][$subIsn] = [];
                        if (isset($object->ObjAttr->row)) {
                            foreach ($object->ObjAttr->row as $row) {
                                //array_push($objects['AGROBJECT_ADDATTR'], [
                                $objects['AGROBJECT_ADDATTR'][$subIsn][(string)$row->AttrISN] = array(
                                    'AttrISN' => (string)$row->AttrISN,
                                    'Type' => (string)$row->TypeValue,
                                    'Label' => (string)$row->AttrName,
                                    'ParentISN' => (string)$row->NumCode,
                                    'Value' => null,
                                    'Remark' => null,
                                    'Childs' => (new SiteController())->getDictiList((string)$row->NumCode)
                                );
                                //]);
                            }
                            if (isset($response->RiskPack->row[$i])) {
                                if(count($response->RiskPack->row) == count($response->Object->row)) {
                                    $row = $response->RiskPack->row[$i];
                                    array_push($objects['AGRCOND'][$subIsn], [
                                        'InsClassisn' => (string)$row->InsClassisn,
                                        'InsClassname' => (string)$row->InsClassname,
                                        'RiskPackisn' => (string)$row->RiskPackisn,
                                        'RiskPackname' => (string)$row->RiskPackname,
                                        //'Risk' => $riskChilds
                                    ]);
                                }
                            }
                        }
                        $i++;
                    }
                }

//                if (isset($response->RiskPack->row)) {
//                    foreach ($response->RiskPack->row as $row) {
//                        array_push($objects['AGRCOND'][$subIsn], [
//                            'InsClassisn' => (string)$row->InsClassisn,
//                            'InsClassname' => (string)$row->InsClassname,
//                            'RiskPackisn' => (string)$row->RiskPackisn,
//                            'RiskPackname' => (string)$row->RiskPackname,
//                            //'Risk' => $riskChilds
//                        ]);
//                    }
//                }

            }
        }
//
        //print '<pre>';print_r($responses);print '</pre>';exit();

        /*if(isset($response->RiskPack->row)){
            foreach ($response->RiskPack->row as $row) {
//                array_push($risks, [
//                    //$objects[(string)$row->AttrISN] = array(
//                    'AttrISN' => (string)$row->AttrISN,
//                    'Type' => (string)$row->TypeValue,
//                    'Label' => (string)$row->AttrName,
//                    'ParentISN' => (string)$row->NumCode,
//                    'Value' => null,
//                    'Remark' => null,
//                    'Childs' => (new SiteController())->getDictiList((string)$row->NumCode)
//                ]);
//                $riskChilds = [];
//                if(isset($row->Risk->row)) {
//                    foreach ($row->Risk->row as $rows) {
//                        array_push($riskChilds,[
//                            'InsClassisn' => (string)$rows->InsClassisn,
//                            'RiskPackisn' => (string)$rows->RiskPackisn,
//                            'riskisn' => (string)$rows->riskisn,
//                            'riskname' => (string)$rows->riskname
//                        ]);
//                    }
//                }
                array_push($objects['AGRCOND'],[
                    'InsClassisn' => (string)$row->InsClassisn,
                    'InsClassname' => (string)$row->InsClassname,
                    'RiskPackisn' => (string)$row->RiskPackisn,
                    'RiskPackname' => (string)$row->RiskPackname,
                    //'Risk' => $riskChilds
                ]);
            }
        }*/

        //print '<pre>';print_r($response);print '</pre>';exit();
        return response()->json([
            'success' => true,
            'objects' => $objects
        ]);
    }

    public function fullCalc(Request $request, KiasServiceInterface $kias){
        $product_id = $request->id;
        if(($model = FullProduct::find($product_id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }

        $order['prodIsn'] = $model->product_isn;
//        $order['subjISN'] = $request->subjISN;
//        $order['participants'] = $this->participantsToKiasAddAttr($request->all());
//        $order['attributes'] = $this->attributesToKiasAddAttr($request->all()['attributes']);
//        $order['agrclauses'] = $this->agrclausesToKiasAddAttr($request->all()['agrclauses']);
//        $order['contractDate'] = $request->all()['contractDate'];
//        $order['formular'] = $request->all()['formular'];

        $response = $kias->calcFull($order);
        print '<pre>';print_r($response); print '</pre>';exit();
        //print $order['formular']['status']['Value'];exit();
        print '<pre>';print_r($order);print '</pre>';exit();


        $response = $kias->calcFull($order);
        if(isset($response->error)){
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text
            ]);
        }

        return response()->json([
            'success' => true,
            'premium' => (int)$response->ROWSET->row->Premiumsum
        ]);
    }

    public function attributesToKiasAddAttr($attributes){
        $result = [];
        foreach ($attributes as $attribute){
            array_push($result, [
                'ATTRISN' => $attribute['AttrISN'],
                'TYPEVALUE' => $attribute['Type'],//$this->getAttrType($attribute['Type']),
                'ATRVALUE' => $this->getAttrValue($attribute['Value'], $attribute['Type']),
            ]);
        }
        return $result;
    }

    public function participantsToKiasAddAttr($data){
        $result = [];
        foreach ($data['participants'] as $participant){
            array_push($result,
                [
                    'ClassISN' => $participant['ISN'],
                    'SubjISN'  => $participant['subjISN'],
                    'DateBeg'  => date('d.m.Y',strtotime($data['contractDate']['begin'])),
                    'DateEnd'  => date('d.m.Y',strtotime($data['contractDate']['end'])),
                ]
            );
        }
        return $result;
    }

    public function agrclausesToKiasAddAttr($agrclauses){
        $result = [];
        foreach ($agrclauses as $agrclause){
            array_push($result, [
                'ClauseISN' => $agrclause['ISN'],
                'ClassISN' => $agrclause['Value']
            ]);
        }
        return $result;
    }

    public function getAttrType($type)
    {
        switch ($type){
            case 'TEXT' :
                return 'TEXT';
                break;
            case 'DICTI' :
                return 'DICTI';
                break;
            case 'CHECKBOX' :
                return 'CHECKBOX';
                break;
            case 'DATE' :
                return 'DATE';
                break;
            default :
                return 'NUMBER';
        }
    }

    public function getAttrValue($value, $type){
        switch ($type){
            case 'CHECKBOX' :
                return $value ? 1 : 0;
                break;
            case 'DATE' :
                return date('d.m.Y', strtotime($value));
                break;
            default :
                return $value;
        }
    }

    public function getDictis($isn,$type){
        $kias = new Kias();
        $kias->initSystem();
        $response = $kias->getDictiList($isn);
        $result = [];
        array_push($result, [
            'Label' => 'Не выбрано',
            'id' => 0,
            'label' => 'Не выбрано',
            'Type' => ''
        ]);

        if(isset($response->ROWSET->row)){
            foreach ($response->ROWSET->row as $row){
                if($type == 'attributes'){
                    if($row->N_KIDS == '1'){
                        $child_response = $kias->getDictiList((string)$row->ISN);
                        if(isset($child_response->ROWSET->row)){
                            foreach ($child_response->ROWSET->row as $child_row){
                                array_push($result, [
                                    'Value' => (string)$child_row->ISN,
                                    'Label' => (string)$child_row->FULLNAME,
                                    'Type' => (string)$child_row->CODE,
                                    'NumCode' => (string)$child_row->NUMCODE,
                                    'N_Kids' => (string)$child_row->N_KIDS,
                                    'id' => (string)$child_row->ISN,
                                    'label' => (string)$child_row->ISN." - ".(string)$row->FULLNAME." ".(string)$child_row->FULLNAME,
                                ]);
                            }
                        }else{
                            array_push($result, [
                                'Label' => (string)$row->FULLNAME,
                                'id' => (string)$row->ISN,
                                'Value' => (string)$row->ISN,
                                'label' => (string)$row->ISN.' - '.(string)$row->FULLNAME,
                                'Type' => (string)$row->CODE,
                                'NumCode' => (string)$row->NUMCODE,
                                'N_Kids' => (string)$row->N_KIDS,
                            ]);
                        }
                    }else{
                        array_push($result, [
                            'Label' => (string)$row->FULLNAME,
                            'id' => (string)$row->ISN,
                            'Value' => (string)$row->ISN,
                            'label' => (string)$row->ISN.' - '.(string)$row->FULLNAME,
                            'Type' => (string)$row->CODE,
                            'NumCode' => (string)$row->NUMCODE,
                            'N_Kids' => (string)$row->N_KIDS,
                        ]);
                    }
                } else {
                    array_push($result, [
                        'Label' => (string)$row->FULLNAME,
                        'id' => (string)$row->ISN,
                        'Value' => (string)$row->ISN,
                        'label' => (string)$row->ISN.' - '.(string)$row->FULLNAME,
                        'Type' => (string)$row->CODE,
                        'NumCode' => (string)$row->NUMCODE,
                        'N_Kids' => (string)$row->N_KIDS,
                    ]);
                }
            }




//            foreach ($response->ROWSET->row as $row){
//                array_push($result, [
//                    'Label' => (string)$row->FULLNAME,
//                    'id' => (string)$row->ISN,
//                    'Value' => (string)$row->ISN,
//                    'label' => (string)$row->ISN.' - '.(string)$row->FULLNAME,
//                    'Type' => (string)$row->CODE,
//                    'NumCode' => (string)$row->NUMCODE,
//                    'N_Kids' => (string)$row->N_KIDS,
//                ]);
//            }
        }
        return $result;
    }
}
