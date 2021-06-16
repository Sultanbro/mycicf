<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\ExpressProduct;
use App\ExpressQuotation;
use App\FullProduct;
use App\FullQuotation;
use App\FullConstructor;
use App\InsProduct;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use DateTime;

class ProductsController extends Controller
{
    const DICT_CURRENCY_USD = 9716;
    const DICT_CURRENCY_RUB = 9788;
    const DICT_CURRENCY_EURO = 9721;
    const DICT_CURRENCY_TENGE = 9813;

    protected $siteController;

    public function __construct(){
        $this->siteController = new SiteController();
    }

    public function index($id = 1){
        $data = InsProduct::findOrFail($id);
        $consturction = json_decode($data->construction);
        return view('product', compact('data'), compact('consturction'));
    }

    public function express($ID,$quotationId){
        if(($data = ExpressProduct::find($ID)) === null){
            abort(404, 'Такой продукт не найден');
        }
        $productName = $data->name;
        return view('express.create', compact('ID','quotationId','productName'));
    }

    // Admin routes

    public function createExpress(){
        $data = (object)[];
        return view('products.create.express',compact('data'));
    }

    public function createEdit($id){
        if(($data = ExpressProduct::find($id)) === null){
            abort(404, 'Такой продукт не найден');
        }
        return view('products.create.express',compact('data'));
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
                'isn' => $data->product_isn,
                'ordinal' => $data->ordinal,
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
            $model = $request->id != 0 ? ExpressProduct::find($request->id) : new ExpressProduct();
            $model->name = $request->name;
            $model->product_isn = $request->product_isn;
            $model->ordinal = $request->ordinal;
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
        //return view('products.create.full');
    }

    public function listFullQuotation(){
        return view('products.list.full');
    }

    public function getFullQuotationList(Request $request){
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

    public function getFullConstructor ($id){
        $product = ExpressProduct::find($id);
        $constructor = FullConstructor::where('product_id',$id)->first();
        $sections = isset($constructor->data) ? json_decode($constructor->data) : [];
        $parentisns = isset($constructor->parentisns) ? json_decode($constructor->parentisns) : (object)[];

        $data['participants'] = isset($sections->participants) ? $sections->participants : [];
        //$data['objects'] = isset($constructor->objects) ? $constructor->objects : [];
        $data['attributes'] = isset($sections->attributes) ? $sections->attributes : [];
        $data['agrclauses'] = isset($sections->agrclauses) ? $sections->agrclauses : [];
        $data['formular'] = isset($sections->formular) ? $sections->formular : [];
        return view('products.create.full_constructor',compact(['product','data','parentisns']));
    }

    public function setFullConstructor(Request $request, KiasServiceInterface $kias){
        try{
            $constructor = FullConstructor::where('product_id',$request->id)->first() ?? new FullConstructor();
            $constructor->product_id = $request->id;
            $constructor->product_isn = $request->product_isn;
            $constructor->user_isn = Auth::user()->ISN;

            $response = $kias->getFullObject($constructor->product_isn);

            if (isset($response->error)) {
                return response()->json([
                    'success' => false,
                    'error' => (string)$response->error->fulltext
                ]);
            }

            $objects = [];
            $risks = [];    //RiskPack
            if(isset($response)){
                $risks = 0;
                if (isset($response->Object->row)) {
                    $objects['ClassISN'] = '';
                    $objects['SubClassISN'] = '';
                    $objects['ObjName'] = '';
                    $objects['RiskISN'] = '';
                    $objects['InsClassISN'] = '';
                    $objects['insureSum'] = '';
                    $objects['franch'] = '';
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
                                'TerritoryISN' => '',
                                'CountryISN' => '',
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

                }

//                if (isset($response->AgrClause->row)) {
//                    $delete = Dicti::where('numcode',$request->product_isn)->delete();
//                    $dict = 0;
//                    $save = false;
//                    foreach ($response->AgrClause->row as $agrRow) {
//                        if($dict != (string)$agrRow->clauseisn) {
//                            $dictionary = new Dicti;
//                            $dictionary->isn = $request->product_isn . (string)$agrRow->clauseisn;
//                            $dictionary->fullname = (string)$agrRow->clausename;
//                            $dictionary->parent_isn = $request->product_isn;
//                            //$dictionary->parent_name = (string)$agrRow->clausename;
//                            $dictionary->code = '';
//                            $dictionary->numcode = $request->product_isn;
//                            $save = $dictionary->save();
//                            $dict = (string)$agrRow->clauseisn;
//                        }
//                        if((string)$agrRow->classisn != '' && (string)$agrRow->classisn != null) {
//                            //$delete = Dicti::where('parent_isn',$request->product_isn.(string)$agrRow->clauseisn)->delete();
//                            $dictionary = new Dicti;
//                            $dictionary->isn = (string)$agrRow->clauseisn.(string)$agrRow->classisn;
//                            $dictionary->fullname = (string)$agrRow->classname;
//                            $dictionary->parent_isn = $request->product_isn.(string)$agrRow->clauseisn;
//                            $dictionary->parent_name = (string)$agrRow->clausename;
//                            $dictionary->code = '';
//                            $dictionary->numcode = $request->product_isn;
//                            $dictionary->save();
//                        }
//                    }
//                }
            }

            $agrclauses = $request->agrclauses;
            $attributes = $request->all()['attributes'];
//            if(isset($request->agrclauses)){
//                $agrclauses = $request->agrclauses;
//                foreach($agrclauses as $key => $agrclause){
//                    if(isset($agrclause['Type']) && $agrclause['Type'] == 'DICTI' || isset($agrclause['N_Kids']) && $agrclause['N_Kids'] == 1){
//                        $isn = $agrclause['NumCode'] != '' && $agrclause['NumCode'] != null ? $agrclause['NumCode'] : $agrclause['ISN'];
//                        $agrclauses[$key]['Childs'] = $this->getDictis($isn,'');
//                    }
//                }
//            } else {
//                $agrclauses = [];
//            }
//
//            if(isset($request->all()['attributes'])){
//                $attributes = $request->all()['attributes'];
//                foreach($attributes as $key => $attribute){
//                    if(isset($attribute['Type']) && $attribute['Type'] == 'DICTI' || isset($attribute['N_Kids']) && $attribute['N_Kids'] == 1){
//                        $isn = isset($attribute['NumCode']) && $attribute['NumCode'] != '' ? $attribute['NumCode'] : $attribute['ISN'];
//                        $attributes[$key]['Childs'] = $this->getDictis($isn,'attributes');
//                    }
//                }
//            } else {
//                $attributes = [];
//            }

            $constructor->data = json_encode(array(
                'agrobjects' => $objects,
                'participants' => $request->participants,
                'attributes' => $attributes,    //$request->all()['attributes'],
                'agrclauses' => $agrclauses,    //$request->agrclauses,
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
            'success' => true,
            'redirect_link' => route('list.full')
        ]);
    }

    public function getDicti(Request $request){
        try{
            if($request->getFromKias == 1){
                $result = $this->getDictiKias((string)$request->ISN, $request->type);
            } else {
                $result = $this->getDictiBase((string)$request->ISN, $request->type);
            }
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
        foreach (ExpressProduct::orderBy('ordinal','asc')->get() as $product){
            array_push($products, [
                'url' => "/express/calc/{$product->id}/0",
                'name' => $product->name,
                'isn' => $product->product_isn
            ]);
        }
        return view('express.list', compact('products'));
    }

    public function getExpressAttributes(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $ProductISN = ExpressProduct::find($ID)->product_isn;
        $status = null;
        if($request->quotationId != 0) {
            $quotation = ExpressQuotation::find($request->quotationId);
            $attributes = json_decode($quotation->data)->attributes;
            $participants = json_decode($quotation->data)->participants;

            if($quotation->user_isn != Auth::user()->ISN){
                return response()->json([
                    'success' => false,
                    'error' => 'У вас нет доступа к этой записи'
                ]);
            }

            if($quotation->nshb == 1){
                if($quotation->nshb_status != 2518) { // Получаем статус из киаса если статус не подписан
                    $nshb_status = $kias->getOrSetDocs($quotation->nshb_doc, 2, null);
                    if (isset($nshb_status->Status)) {
                        $quotation->nshb_status = $status = (int)$nshb_status->Status;
                        $quotation->save();
                    }
                }
                $nshb = array(
                    'nshb' => 1,
                    'nshb_doc' => $quotation->nshb_doc,
                    'nshb_request' => $quotation->nshb_request,
                    'nshb_id' => $quotation->nshb_id,
                    'nshb_request_id' => $quotation->nshb_request_id,
                    'nshb_status' => $quotation->nshb_status
                );
            }
        } else {
            $response = $kias->getExpressAttributes($ProductISN);
//            if(Cache::has('expressAttr')){
//                $response = Cache::get('expressAttr')[0];
//            } else {
//                $response = $kias->getExpressAttributes($ProductISN);
//                Cache::put('expressAttr',[$response]);
//            }


            $attributes = [];
            $participants = [];
            if (isset($response->ROWSET->row)) {
                foreach ($response->ROWSET->row as $row) {
                    $value = null;
                    if (isset($row->DefValN) && (string)$row->DefValN != null) {
                        $value = (string)$row->DefValN;
                    }
                    if (isset($row->DefValC) && (string)$row->DefValC != null) {
                        $value = (string)$row->DefValC;
                    }
                    if (isset($row->DefValD) && (string)$row->DefValD != null) {
                        $value = (string)$row->DefValD;
                    }

                    $dictiRes = [];
                    if ((string)$row->NumCode != '') {
                        $getDicti = Dicti::where('parent_isn', (string)$row->NumCode)->get();
                        if (count($getDicti) > 0) {
                            array_push($dictiRes, [
                                'Value' => null,
                                'Label' => 'Не выбрано',
                            ]);
                            foreach ($getDicti as $dictiRow) {
                                array_push($dictiRes, [
                                    'Value' => $dictiRow->isn,
                                    'Label' => isset($dictiRow->fullname) ? $dictiRow->fullname : $dictiRow->name,
                                ]);
                            }
                        } else {
                            $dictiRes = (new SiteController())->getDictiList((string)$row->NumCode);
                        }
                    }

                    array_push($attributes, [
                        //$attributes[(string)$row->AttrISN] = array(
                        'AttrISN' => (string)$row->AttrISN,
                        'Type' => (string)$row->TypeValue,
                        'Label' => (string)$row->AttrName,
                        'ParentISN' => (string)$row->NumCode,
                        'Value' => $value,
                        'Remark' => null,
                        'Childs' => $dictiRes,  //(new SiteController())->getDictiList((string)$row->NumCode),
                        'Required' => (string)$row->Required,
                        'ReadOnly' => (string)$row->ReadOnly
                        //);
                    ]);
                }
            }
        }
        return response()->json([
            'success' => true,
            'attributes' => $attributes,
            'participants' => $participants,
            'status' => $status,
            'premiumSum' => isset($quotation->premiumSum) ? $quotation->premiumSum : 0,
            'nshb' => isset($nshb) ? $nshb : null,
            'calc_isn' => isset($quotation->calc_isn) ? $quotation->calc_isn : null,
            'calc_id' => isset($quotation->calc_id) ? $quotation->calc_id : null,
            'full_id' => isset($quotation->full_id) ? $quotation->full_id : null,
            'tariff' => isset($quotation->tariff) ? $quotation->tariff : null,
            'remark' => isset($quotation->remark) ? $quotation->remark : null,
            'prem_one' => isset($quotation->prem_one) ? $quotation->prem_one : null,
            'prem_fam' => isset($quotation->prem_fam) ? $quotation->prem_fam : null,
            'limit_sum_one' => isset($quotation->limit_sum_one) ? $quotation->limit_sum_one : null,
        ]);
    }

    public function expressCalc(Request $request, KiasServiceInterface $kias){  // Расчет и запись в базу ЭК

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

        if($request->nshb){
            $response = $kias->expressCalculator($prodIsn, $subjISN, $attributes, 1);   // Нестандартный шаблон договора
        } else {
            $response = $kias->expressCalculator($prodIsn, $subjISN, $attributes, null);    // Обычная ЭК
        }

        if (isset($response->error)) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text
            ]);
        }

//        if($request->nshb == 1){
            $quotation = $request->quotationId != 0 ? ExpressQuotation::find($request->quotationId) : new ExpressQuotation;
            $quotation->product_isn = $model->product_isn;
            $quotation->user_isn = Auth::user()->ISN;
            $quotation->sabj_isn = $subjISN;
            $quotation->calc_isn = (string)$response->ISN;   //(int)$response->AgrCalcISN;
            $quotation->calc_id = (string)$response->CalcID;    //(string)$response->CalcID;
            $quotation->tariff = isset($response->Tariff) ? (string)$response->Tariff : '';   //(int)$response->AgrCalcISN;
            $quotation->remark = isset($response->Remark) ? (string)$response->Remark : '';
            $quotation->premiumSum = (int)$response->ROWSET->row->Premiumsum; //(int)$response->PremiumSum;    // Если отправл
            $quotation->data = json_encode($request->all());
            $quotation->nshb = $request->nshb ? 1 : 0;

//            $getStatus = $kias->getAgrStatus($response->AgrCalcISN);    // Берем статус из киаса
//            if(isset($getStatus->error)){   // Если вернулась ошибка, записываем первоначальный статус
//                //$quotation->status = $order['formular']['status']['Value'];
//            } else {
//                if(isset($getStatus->Product) && $getStatus->Product == $model->product_isn){
//                    $quotation->status = (int)$getStatus->StatusISN;
//                    $quotation->status_name = (string)$getStatus->Status;
//                }
//            }

//        if(isset($response->CustomDoc)){
//            if((string)$response->CustomDoc != null) {
                $quotation->nshb_doc = (string)$response->CustomDoc != '' ? (string)$response->CustomDoc : null;    // Документ исн
                $quotation->nshb_request = (string)$response->Request != '' ? (string)$response->Request : null;
                $quotation->nshb_id = (string)$response->DocID != '' ? (string)$response->DocID : null;    // номер документа
                $quotation->nshb_request_id = (string)$response->RequestID != '' && (string)$response->RequestID != null ? (string)$response->RequestID : null;    // номер заявки НШБ

                $quotation->prem_one = isset($response->PremOne) ? (string)$response->PremOne : null;
                $quotation->prem_fam = isset($response->PremFam) ? (string)$response->PremFam : null;
                $quotation->limit_sum_one = isset($response->LimitSumOne) != '' ? (string)$response->LimitSumOne : null;

                //$setDocStatus = $kias->getOrSetDocs((string)$response->CustomDoc, 1, 2522);

//                if(isset($setDocStatus->error)){
//                    return response()->json([
//                        'success' => false,
//                        'error' => (string)$setDocStatus->error->fulltext
//                    ]);
//                }
//
//                if(isset($setDocStatus->Status)){
//                    $quotation->nshb_status = (int)$setDocStatus->Status;
//                }
//            }
//        }

            $quotation->save();
//        }

        return response()->json([
            'success' => true,
            'premium' => (int)$response->ROWSET->row->Premiumsum,
            'calc_isn' => (string)$response->ISN,
            'calc_id' => $quotation->calc_id,
            'tariff' => $quotation->tariff,
            'remark' => $quotation->remark,
            'nshb_doc' => $quotation->nshb_doc,
            'nshb_request' => $quotation->nshb_request,
            'nshb_id' => $quotation->nshb_id,
            'redirect_link' => route('express_quotations_list',['productISN' => $quotation->product_isn]),
            'nshb_request_id' => $quotation->nshb_request_id,

            'prem_one' => $quotation->prem_one,
            'prem_fam' => $quotation->prem_fam,
            'limit_sum_one' => $quotation->limit_sum_one,
        ]);
    }

    public function CreateAgrByAgrcalc(Request $request, KiasServiceInterface $kias){       // Создание ПК из ЭК
        $product_id = $request->id;
        if(($model = ExpressProduct::find($product_id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт не найден'
            ]);
        }

        $response = $kias->CreateAgrByAgrcalc($request->calc_isn);

        if (isset($response->error)) {
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->text
            ]);
        }

        $express_quotation = ExpressQuotation::where('calc_isn',$request->calc_isn)->first();
        $express_quotation->full_isn = (string)$response->AgrISN;
        $express_quotation->save();

        $agreement = $kias->getAgreementCalc((string)$response->AgrISN,$model->product_isn); // Берем данные полной котировки из киаса
        if (isset($agreement->error)) {
            return response()->json([
                'success' => false,
                'error' => (string)$agreement->error->text
            ]);
        }

        $from_express = [];                             // Временно записываем данные полной котировки, которые пришли из киаса, которые мигрировались из экспресс котировки
        if (isset($agreement->AgreementCalc->row)) {
            foreach($agreement->AgreementCalc->row as $row){
                $from_express['agreementID'] = (string)$row->ID;
                if (isset($row->AGREEMENT_ADDATTR->row)){
                    foreach($row->AGREEMENT_ADDATTR->row as $attrRow){
                       $from_express['AGREEMENT_ADDATTR'][(int)$attrRow->ATTRISN] = (string)$attrRow->TYPEVALUE == 'CHECKBOX' ? (string)$attrRow->VAL == 1 ? true : false : (string)$attrRow->VAL;
                        //$from_express['ADDATTR_TYPE'][(int)$attrRow->ATTRISN] = (string)$attrRow->TYPEVALUE;
                    }
                }
                if (isset($row->AGROBJECT->row)){
                    foreach($row->AGROBJECT->row as $attrRow){
                        $from_express['AGROBJECT']['ClassISN'] = (string)$attrRow->ClassISN;
                        $from_express['AGROBJECT']['SubClassISN'] = (string)$attrRow->SubClassISN;
                        $from_express['AGROBJECT']['ObjName'] = (string)$attrRow->SubClassName;
                        if(isset($attrRow->AGROBJECT_ADDATTR->row)){
                            foreach($attrRow->AGROBJECT_ADDATTR->row as $objectRow){
                                $from_express['AGROBJECT_ADDATTR'][(int)$objectRow->ATTRISN] = (string)$objectRow->TYPEVALUE == 'CHECKBOX' ? (string)$objectRow->VAL == 1 ? true : false : (string)$objectRow->VAL;
                                //$from_express['ADDATTR_TYPE'][(int)$objectRow->ATTRISN] = (string)$objectRow->TYPEVALUE;
                            }
                        }

                        if(isset($attrRow->AGROBJCAR->ReleaseDate)){
                            $from_express['AGROBJCAR']['ReleaseDate'] = date('d.m.Y',strtotime($attrRow->AGROBJCAR->ReleaseDate));
                        }

                        if(isset($attrRow->AGRCOND->row)){
                            foreach($attrRow->AGRCOND->row as $agrcondRow){
                                //$from_express['AGRCOND'][(int)$agrcondRow->RiskISN] = (string)$agrcondRow->InsClassISN;
                                $from_express['AGRCOND']['RiskISN'] = (string)$agrcondRow->RiskISN;
                                $from_express['AGRCOND']['InsClassISN'] = (string)$agrcondRow->InsClassISN;
                                $from_express['AGRCOND']['LimitSum'] = (string)$agrcondRow->LimitSum;
                                $from_express['AGRCOND']['PremiumSum'] = (string)$agrcondRow->PremiumSum;

                                $from_express['AGRCOND']['FranchType'] = (string)$agrcondRow->FranchType;
                                $from_express['AGRCOND']['FranchTariff'] = (string)$agrcondRow->FranchTariff == ',5' ? '0,5' : (string)$agrcondRow->FranchTariff;
                                $from_express['AGRCOND']['FranchSum'] = (string)$agrcondRow->FranchSum;

                                $from_express['AGRCOND']['date']['begin'] = date('Y-m-d',strtotime((string)$agrcondRow->DateBeg));
                                $from_express['AGRCOND']['date']['end'] = date('Y-m-d',strtotime((string)$agrcondRow->DateEnd));
                                $from_express['AGRCOND']['date']['sig'] = date('Y-m-d',strtotime((string)$agrcondRow->DateSign));
                            }
                        }

                    }
                }
                if (isset($row->AGRCLAUSE->row)){
                    foreach($row->AGRCLAUSE->row as $agrclauseRow){
                        $from_express['AGRCLAUSE'][(int)$agrclauseRow->ClauseISN] = (string)$agrclauseRow->ClassISN;
                    }
                }
            }
        }

        $constructor = FullConstructor::where('product_isn',$model->product_isn)->first();  // Достаем конструктор полной котировки
        if($constructor) {
            $data = isset($constructor->data) ? json_decode($constructor->data) : [];
            $express_data = isset($express_quotation->data) ?json_decode($express_quotation->data) : [];
            $participants = isset($data->participants) ? $data->participants : [];
            $agrclauses = isset($data->agrclauses) ? $data->agrclauses : [];
            $attributes = isset($data->attributes) ? $data->attributes : [];
            $objects = $constructor && isset(json_decode($constructor->data)->agrobjects) ? json_decode($constructor->data)->agrobjects : (object)[];

            // Записываем данные полной котировки из киаса в полную котировку конструктора

            if(count($participants) > 0){
                foreach($participants as $key => $participant){
                    if(isset($express_data->participants[0]->ISN) && $participant->ISN == $express_data->participants[0]->ISN){
                        $participants[$key] = $express_data->participants[0];
                    }
                }
            }

//            foreach($express_data->attributes as $exp_atr){
//                //if($exp_atr->AttrISN == 858441){    // Франшиза     857691
//                    if(isset($exp_atr->franch) && $exp_atr->franch != '') {
//                        $from_express['AGRCOND']['FranchSum'] = $exp_atr->franch;
//                    }
//                    //$interval = date_diff(new DateTime($from_express['AGRCOND']['date']['period']['end']), new DateTime($from_express['AGRCOND']['date']['period']['begin']));
//                    //$intervalS = $interval->m + ($interval->y * 12);
//                    //$interval->format('%m');
//                    //$from_express['AGRCOND']['date']['period'] = $interval->format('%m');
//
//                //}
//            }


            $objects = (array)$objects;
            if($objects){
                $objects['ClassISN'] = isset($from_express['AGROBJECT']['ClassISN']) ? $from_express['AGROBJECT']['ClassISN'] : '';
                $objects['SubClassISN'] = isset($from_express['AGROBJECT']['SubClassISN']) ? $from_express['AGROBJECT']['SubClassISN'] : '';
                $objects['ObjName'] = isset($from_express['AGROBJECT']['ObjName']) ? $from_express['AGROBJECT']['ObjName'] : '';
                $objects['InsClassISN'] = isset($from_express['AGRCOND']['InsClassISN']) ? $from_express['AGRCOND']['InsClassISN'] : '';
                $objects['RiskISN'] = isset($from_express['AGRCOND']['RiskISN']) ? $from_express['AGRCOND']['RiskISN'] : '';
                $objects['insureSum'] = isset($from_express['AGRCOND']['LimitSum']) ? $from_express['AGRCOND']['LimitSum'] : '';
                $objects['franchSum'] = isset($from_express['AGRCOND']['FranchSum']) ? $from_express['AGRCOND']['FranchSum'] : '';
                $objects['franchTariff'] = isset($from_express['AGRCOND']['FranchTariff']) ? $from_express['AGRCOND']['FranchTariff'] : '';
                $objects['expressTsRelease'] = isset($from_express['AGROBJCAR']['ReleaseDate']) ? $from_express['AGROBJCAR']['ReleaseDate'] : '';

                foreach($objects['objekt'] as $key => $object){
                    if($object){
                        foreach($object->AGROBJECT_ADDATTR as $index => $agrobject_addatr){
                            if(isset($from_express['AGROBJECT_ADDATTR'][$agrobject_addatr->AttrISN])) {
                                $expressAgrObjectAddatr = $from_express['AGROBJECT_ADDATTR'][$agrobject_addatr->AttrISN];
                                if ($expressAgrObjectAddatr != '' && $expressAgrObjectAddatr != null && $expressAgrObjectAddatr != 0) {
                                    $objects['objekt']->{$key}->AGROBJECT_ADDATTR->{$index}->Value = $expressAgrObjectAddatr;
                                }
                            }
                        }
                    }
                }
                $objects = [$objects];
            }

            if(count($attributes) > 0){
                foreach($attributes as $key => $attribute){
                    if(isset($from_express['AGREEMENT_ADDATTR'][$attribute->AttrISN])) {
                        $agreementAddatr = $from_express['AGREEMENT_ADDATTR'][$attribute->AttrISN];
                        if (isset($agreementAddatr) && $agreementAddatr != '' && $agreementAddatr != null && $agreementAddatr != 0) {
                            $attributes[$key]->Value = $agreementAddatr;
                        }
                    }
                }
            }

            if(count($agrclauses) > 0){
                foreach($agrclauses as $key => $agrclause){
                    if(isset($from_express['AGRCLAUSE'][$agrclause->ISN]) && $from_express['AGRCLAUSE'][$agrclause->ISN] != ''  && $from_express['AGRCLAUSE'][$agrclause->ISN] != null){
                        $agrclauses[$key]->Value = $from_express['AGRCLAUSE'][$agrclause->ISN];
                    }
                }
            }

            $interval = date_diff(new DateTime($from_express['AGRCOND']['date']['end']), new DateTime($from_express['AGRCOND']['date']['begin']));
            //$intervalS = $interval->m + ($interval->y * 12);
            //$interval->format('%m');
            $from_express['AGRCOND']['date']['period'] = intval($interval->format('%m'))+1;

            $changed_data = json_encode(array(
                'subjISN' => $express_data->subjISN,
                'id' => $model->id,
                'quotationId' => 0,
                'agrobjects' => $objects,
                'participants' => $participants,
                'attributes' => $attributes,    //$request->all()['attributes'],
                'agrclauses' => $agrclauses,    //$request->agrclauses,
                'formular' => $data->formular[0],
                'contractDate' => $from_express['AGRCOND']['date'],
                'DAremark' => null,
                'calcDA' => 0
            ));


            $full_quotation = new FullQuotation;
            $full_quotation->product_isn = $model->product_isn;
            $full_quotation->user_isn = Auth::user()->ISN;
            $full_quotation->calc_isn = (string)$response->AgrISN;
            $full_quotation->calc_id = isset($from_express['agreementID']) ? $from_express['agreementID'] : 1;
            $full_quotation->express_isn = $express_quotation->calc_isn;
            $full_quotation->express_id = $express_quotation->calc_id;
            $full_quotation->premiumSum = $express_quotation->premiumSum;
            $full_quotation->data = $changed_data;
            $full_quotation->calc_da = 0;

            $getStatus = $kias->getAgrStatus((string)$response->AgrISN);    // Берем статус из киаса
            if (isset($getStatus->error)) {   // Если вернулась ошибка, записываем первоначальный статус
                $full_quotation->status = $constructor['formular']['status']['Value'];
            } else {
                if (isset($getStatus->Product) && $getStatus->Product == $model->product_isn) {
                    $full_quotation->status = (int)$getStatus->StatusISN;
                    $full_quotation->status_name = (string)$getStatus->Status;
                }
            }
            $full_quotation->save();

            $express_quotation->full_id = $full_quotation->calc_id;
            $express_quotation->save();

            return response()->json([
                'success' => true,
                'result' => '',
                'full_isn' => (string)$response->AgrISN,
                'full_id' => $express_quotation->full_id,
                'quotation_id' => $full_quotation->id
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Нет данных о продукте. Обратитесь пожалуйста к администратору'
            ]);
        }
    }

    public function fullList(Request $request){
        $isBitrix = $this->siteController->isBitrixRequest($request);
        $products = [];
        foreach (ExpressProduct::orderBy('ordinal','asc')->get() as $product){
            if(isset($product->constr->id)) {
                array_push($products, [
                    'url' => "/full/calc/{$product->id}/0",
                    'name' => $product->name,
                    'isn' => $product->product_isn
                ]);
            }
        }
        return view('full.list', compact('products','isBitrix'));
    }

    public function fullQuotationList($productISN,Request $request){
        $quotations = FullQuotation::where('product_isn',$productISN)->where('user_isn',Auth::user()->ISN);

        $calc_da = $request->DA != 1 ? 0 : 1;
        $quotations = $quotations->where('calc_da',$calc_da);

        if($request->status != ''){
            $quotations = $quotations->where('status',$request->status);
        }

//        if ($request->type == 1) {
//            $quotations = $quotations->whereNotNull('contract_number')->where('contract_number', '!=', '');
//        } else {
//            $quotations = $quotations->where('contract_number','');
//        }

        $isBitrix = $this->siteController->isBitrixRequest($request);
        $quotations = $quotations->orderBy('created_at','desc')->paginate(15);
        $product = ExpressProduct::where('product_isn',$productISN)->first();
        $statuses = (new SiteController())->getDictiList(json_decode($product->constr->parentisns)->formular->status);
        return view('full.quotation_list', compact(['quotations','product','statuses', 'isBitrix']))->with('request',$request->all());
    }

    public function expressQuotationList($productISN, Request $request){
        $user_isn = Auth::user()->ISN;
        $quotations = ExpressQuotation::where(['user_isn' => $user_isn,'product_isn' => $productISN]);

        if(!isset($request->nshb)) {
            //$quotations = $quotations->where('nshb',1);
        } else {
            //$quotations = $quotations->where('nshb',$request->nshb);
        }


        if($request->status != ''){
            //$quotations = $quotations->where('status',$request->status);
        }

//        if ($request->type == 1) {
//            $quotations = $quotations->whereNotNull('contract_number')->where('contract_number', '!=', '');
//        } else {
//            $quotations = $quotations->where('contract_number','');
//        }

        $quotations = $quotations->orderBy('created_at','desc')->paginate(15);
        $product = ExpressProduct::where('product_isn',$productISN)->first();
        $statuses = isset($product->constr->parentisns) ? (new SiteController())->getDictiList(json_decode($product->constr->parentisns)->formular->status) : [];
        return view('express.quotation_list', compact(['quotations','product','statuses']))->with('request',$request->all());
    }

    public function fullCreate(Request $request){
        if(($model = ExpressProduct::find($request->id)) === null){
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

    public function fullCreateEdit($ID, $quotationId, Request $request){
        $isBitrix = $this->siteController->isBitrixRequest($request);
        if(($model = ExpressProduct::find($ID)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }
        $expressAttr = isset($request->all()['attributes']) ? json_decode($request->all()['attributes']) : (object)[];
        $productName = $model->name;
        return view('full.create', compact(['ID','quotationId','productName','expressAttr','isBitrix']));
    }

    public function getFullData(Request $request, KiasServiceInterface $kias){      // Получить доп.аттрибуты, оговорки и ограничения, участники
        $ID = $request->id;

//        if(Cache::has('full_constructor')){
//            $constructor = Cache::get('full_constructor');
//        } else {
            //$constructor = FullConstructor::select(['data','product_isn'])->where('product_id',$ID)->first();
            //Cache::put('full_constructor',FullConstructor::select(['data','product_isn'])->where('product_id',$ID)->first());
//        }

        $constructor = FullConstructor::where('product_id',$ID)->first();
        $status = 0;
        if($request->quotationId != 0) {
            $constructor = $cons = FullQuotation::find($request->quotationId);

            if($constructor->user_isn != Auth::user()->ISN){
                return response()->json([
                    'success' => false,
                    'error' => 'У вас нет доступа к этой записи'
                ]);
            }

            $calc_isn = $constructor->calc_isn;
            $DA_isn = $constructor->DA_isn;
            $calc_id = $constructor->calc_id;
            $DA_nomer = $constructor->DA_nomer;
            $express_isn = $constructor->express_isn;
            $express_id = $constructor->express_id;
            $contract_number = $constructor->contract_number;
            $premiumSum = $constructor->premiumSum;
            $docs = json_decode($constructor->docs);
            $status = $constructor->status;
            //if($constructor->status != 223371 && $constructor->status != 223370) {  //223371 - отказано, 223370 - согласовано
                if($constructor->contract_number == '' || $constructor->contract_number == null) {
                    $getStatus = $kias->getAgrStatus($constructor->calc_isn);
                    if (isset($getStatus->Product) && $getStatus->Product == $constructor->product_isn) {
                        $constructor->status = (int)$getStatus->StatusISN;
                        $status = (int)$getStatus->StatusISN;
                        $constructor->status_name = (string)$getStatus->Status;
                        $constructor->save();
                    }
                }
            //}

            $inspection = array(
                'active' => $cons->inspection_date != '' || $cons->inspection_time != '' || $cons->inspection_address != '' ? true : false,
                'type' => $cons->inspection_type,
                'date' => $cons->inspection_date,
                'time' => $cons->inspection_time,
                'address' => $cons->inspection_address
            );
        }

        $data = isset($constructor->data) ? json_decode($constructor->data) : [];
        $formular = isset($data->formular) ? $request->quotationId != 0 ? $data->formular : $data->formular[0] : [];
        $participants = isset($data->participants) ? $data->participants : [];
        $DAremark = isset($data->DAremark) ? $data->DAremark : null;

        $agrclauses = isset($data->agrclauses) ? $data->agrclauses : [];
        $attributes = isset($data->attributes) ? $data->attributes : [];
        $contractDate = isset($data->contractDate) ? $data->contractDate : [];

        return response()->json([
            'success' => true,
            'participants' => $participants,
            'agrclauses' => $agrclauses,
            'attributes' => $attributes,
            'contractDate' => (object)$contractDate,
            'formular' => $formular,
            'calc_isn' => isset($calc_isn) && $calc_isn != '' ? $calc_isn : null,
            'DA_isn' => isset($DA_isn) && $DA_isn != '' ? $DA_isn : null,
            'calc_id' => isset($calc_id) && $calc_id != '' ? $calc_id : null,
            'DA_nomer' => isset($DA_nomer) && $DA_nomer != '' ? $DA_nomer : null,
            'express_isn' => isset($express_isn) && $express_isn != '' ? $express_isn : null,
            'express_id' => isset($express_id) && $express_id != '' ? $express_id : null,
            'contract_number' => isset($contract_number) && $contract_number != '' ? $contract_number : null,
            'price' => isset($premiumSum) && $premiumSum != '' ? $premiumSum : 0,
            'docs' => isset($docs) && $docs != '' ? $docs : [],
            'calc_da' => isset($constructor->calc_da) ? intval($constructor->calc_da) : 0,
            'status_name' => isset($constructor->status_name) ? $constructor->status_name : 'Оформление',
            'DAremark' => $DAremark,
            'status' => $status,
            'inspection'  => isset($inspection) ? $inspection : null
        ]);
    }

    public function getFullObjects(Request $request, KiasServiceInterface $kias){       // Получить объекты
        $ID = $request->id;
        $product = ExpressProduct::find($ID);
        if($request->quotationId != 0) {        // Если котировка уже есть в нашей базе
            if(isset($request->express_isn) && $request->express_isn != null){
                $constructor = FullConstructor::where('product_isn',$product->product_isn)->first();
                $objects = $constructor && isset(json_decode($constructor->data)->agrobjects) ? json_decode($constructor->data)->agrobjects : (object)[];
            } else {
                $quotation = FullQuotation::find($request->quotationId);    //where('product_isn', $product->product_isn)->where('id', $request->quotationId)->first();
                $objects = isset(json_decode($quotation->data)->agrobjects) ? json_decode($quotation->data)->agrobjects : [];
            }
        } else {
            $constructor = FullConstructor::where('product_isn',$product->product_isn)->first();
            $objects = $constructor && isset(json_decode($constructor->data)->agrobjects) ? json_decode($constructor->data)->agrobjects : (object)[];
        }

        return response()->json([
            'success' => true,
            'objects' => $objects
        ]);
    }

    public function fullCalc(Request $request, KiasServiceInterface $kias){     // Расчет ПК
        $product_id = $request->id;
        if(($model = ExpressProduct::find($product_id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }
        $quotation = $request->quotationId != 0 && $request->express_isn != null ? FullQuotation::find($request->quotationId) : new FullQuotation;

        $order['prodIsn'] = $model->product_isn;
        $order['subjISN'] = $request->subjISN;
        $order['calc_isn'] = isset($quotation->calc_isn) ? $quotation->calc_isn : '';
        $order['calc_id'] = isset($quotation->calc_id) ? $quotation->calc_id : '';
        $order['participants'] = $this->participantsToKiasAddAttr($request->all());         // Формируем
        $order['attributes'] = $this->attributesToKiasAddAttrs($request->all()['attributes']);
        $order['und_attributes'] = $this->undAttributesToKiasAddAttrs($request->all()['attributes']);   // Underwriters attrs
        $order['agrclauses'] = $this->agrclausesToKiasAddAttr($request->all()['agrclauses']);
        $order['contractDate'] = $request->all()['contractDate'];
        $order['formular'] = $request->all()['formular'];
        $order['agrobject'] = $this->agrobjectToKiasAdd($request->all(),$quotation);
        $order['calcDA'] = $request->calcDA != 1 ? $request->quotationId != 0 && $quotation->express_id != '' && $quotation->express_id != null ? 2 : 0 : $request->calcDA;
        $order['DAremark'] = $request->DAremark;
        $curator = $request->all()['formular']['curator'];
        $order['curator'] = $curator['Value'] != 0 && isset($curator['subjISN']) && $curator['subjISN'] != null ? $curator['subjISN'] : null;

        $response = $kias->calcFull($order);
        if(isset($response->error)){
            return response()->json([
                'success' => false,
                'error' => (string)$response->error->fulltext
            ]);
        }

        if(isset($response->PremiumSum)) {
            $quotation->product_isn = $order['prodIsn'];
            $quotation->user_isn = Auth::user()->ISN;
            $quotation->calc_isn = (string)$response->AgrCalcISN;
            $quotation->calc_id = (string)$response->CalcID;
            $quotation->premiumSum = $request->calcDA == 1 ? 0 : (int)$response->PremiumSum;    // Если отправл
            $quotation->data = json_encode($request->all());
            $quotation->calc_da = $order['calcDA'];

            $getStatus = $kias->getAgrStatus($response->AgrCalcISN);    // Берем статус из киаса
            if(isset($getStatus->error)){   // Если вернулась ошибка, записываем первоначальный статус
                $quotation->status = $status = $order['formular']['status']['Value'];
            } else {
                if(isset($getStatus->Product) && $getStatus->Product == $order['prodIsn']){
                    $quotation->status = $status = (int)$getStatus->StatusISN;
                    $quotation->status_name = (string)$getStatus->Status;
                }
            }

            if(isset($request->calcDA) && $request->calcDA == 1){
                $quotation->DA_isn = $DA_isn = (string)$response->RequestISN;
                $quotation->DA_nomer = $DA_nomer =  (string)$response->RequestID;
            }

            $quotation->save();

            return response()->json([
                'success' => true,
                'premium' => (int)$response->PremiumSum,
                'calc_isn' => (string)$response->AgrCalcISN,
                'calc_id' => $quotation->calc_id,
                'DA_isn' => isset($DA_isn) && $DA_isn != '' ? $DA_isn : null,
                'DA_nomer' => isset($DA_nomer) && $DA_nomer != '' ? $DA_nomer : null,
                'status' => isset($status) ? $status : null,
                'status_name' => (string)$getStatus->Status
            ]);
        }
    }

    public function createAgr(Request $request, KiasServiceInterface $kias){    // создание договора
        if($request->calc_isn != '' && $request->calc_isn != null) {
            $quotation = FullQuotation::where('calc_isn',$request->calc_isn)->first();
            $success = false;
            $error = '';
            $contractNumber = null;
            if($quotation->contract_number == '' || $quotation->contract_number == null) {
                    try {
                        $result = $kias->createAgrFromAgrCalc($request->calc_isn);
                        if (isset($result->error)) {
                            $error = (string)$result->error->fulltext;
                        } else {
                            $quotation->kias_id = (string)$result->AgrISN;
                            $quotation->contract_number = $contractNumber = (string)$result->AgrID;
                            $quotation->save();
                            $success = true;
                        }
                    } catch (\Exception $ex) {
                        $error = $ex->getMessage();
                    }
            } else {
                $error = 'Договор уже оформлен. Номер договора '.$quotation->contract_number;
            }
            return response()->json([
                'success' => $success,
                'error' => $error,
                'contract_number' => $contractNumber
            ]);
        }
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

    public function attributesToKiasAddAttrs($attributes){
        $result = [];
        foreach ($attributes as $attribute){
            if($attribute['AttrISN'] != 709171) {       // 709171 - Итоговый тариф % для андеров
                array_push($result, [
                    'ATTRISN' => $attribute['AttrISN'],
                    'TYPEVALUE' => $attribute['Type'],//$this->getAttrType($attribute['Type']),
                    'ATRVALUE' => $this->getAttrValue($attribute['Value'], $attribute['Type']),
                    'VAL' => $this->getAttrValue($attribute['Value'], $attribute['Type']),
                ]);
            }
        }
        return $result;
    }

    public function undAttributesToKiasAddAttrs($attributes){
        $result = [];
        foreach ($attributes as $attribute){
            if($attribute['AttrISN'] == 709171) {       // 709171 - Итоговый тариф % для андеров
                array_push($result, [
                    'ATTRISN' => $attribute['AttrISN'],
                    'TYPEVALUE' => $attribute['Type'],//$this->getAttrType($attribute['Type']),
                    'ATRVALUE' => $this->getAttrValue($attribute['Value'], $attribute['Type']),
                    'VAL' => $this->getAttrValue($attribute['Value'], $attribute['Type']),
                ]);
            }
        }
        return $result;
    }

    public function participantsToKiasAddAttr($data){
        $result = [];
        foreach ($data['participants'] as $participant){
            //if($participant['ISN'] != 2103) {
                array_push($result,
                    [
                        'ClassISN' => $participant['ISN'],
                        'SubjISN' => $participant['subjISN'],
                        'DateBeg' => date('d.m.Y', strtotime($data['contractDate']['begin'])),
                        'DateEnd' => date('d.m.Y', strtotime($data['contractDate']['end'])),
                    ]
                );
            //}
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

    public function objcarToKiasAdd($car){
        $result = [];
        //foreach ($agrobjcar as $car){
            array_push($result, [
                    'ModelISN' => intval($car['ModelISN']),
                    'MarkaISN' => intval($car['MarkaISN']),
                    'ClassISN' => intval($car['ClassISN']),
                    'ReleaseDate' => date('d.m.Y',strtotime($car['ReleaseDate'])),
                    'VIN' => $car['VIN'],
                    'REGNO' => $car['REGNO'],
                    'OwnerJuridical' => 'N',
                    'TerritoryISN' => $car['TerritoryISN'],
                    'CountryISN' => intval($car['TerritoryISN']) != 172834 && intval($car['TerritoryISN']) != 172835 ? 9515 : '',
                    'ExtSystemKey' => '',
                    'GRNZ' => $car['REGNO'],
                    'SRTSNUM' =>  $car['SRTSNUM'],
                    'SRTSDATE' => $car['SRTSDATE'],
                    'PROBEG' => intval($car['PROBEG']),
                    'REALPRICE' => intval($car['REALPRICE'])

            ]);
        //}
        return $result;
    }

    public function agrobjectToKiasAdd($order,$quotation = null){
        if(count($order['agrobjects']) > 0) {
            $agr_object = [];
            $subjISN = '';
            $cObj = 0;
            $selectedParticipant = [];
            foreach($order['participants'] as $part) {
                if ($part['ISN'] == 2082) {
                    array_push($selectedParticipant,['subjISN' => $part['Value']]);
                }
            }

            foreach($order['agrobjects'] as $obj) {
                $agrobjectAddatr = $this->attributesToKiasAddAttrs($obj['objekt'][$obj['ClassISN']]['AGROBJECT_ADDATTR']);
                $agrobjCar = $obj['ClassISN'] == 2118 ? $this->objcarToKiasAdd($obj['objekt'][$obj['ClassISN']]['AGROBJCAR'][0]) : [];

                if($obj['ClassISN'] == 2135) {  // Человек
                    //foreach($order['participants'] as $part) {
                    //    if($part['ISN'] == 2082) {
                        //    $subjISN = $part['Value'];
                    $subjISN = isset($selectedParticipant[$cObj]['subjISN']) ? $selectedParticipant[$cObj]['subjISN'] : $selectedParticipant[0]['subjISN'];
                            array_push($agr_object, $this->objectToKiasAdd($obj, $agrobjectAddatr, $agrobjCar, $order, $subjISN,$quotation));
                      //  }
                    //}
                    $cObj++;
                } else {
                    array_push($agr_object, $this->objectToKiasAdd($obj, $agrobjectAddatr, $agrobjCar, $order, $subjISN,$quotation));
                }
            }
            return $agr_object;
        } else {
            return '';
        }
    }

    public function objectToKiasAdd($obj,$agrobjectAddatr,$agrobjCar,$order,$subjISN,$quotation = null){
        if($obj['DAsum'] != null && $obj['DAsum'] != ''){
            $premSum = $obj['DAsum'];
            $tariff = 0;
        } else {
            $premSum = isset($quotation->express_id) && $quotation->express_id != '' && $quotation->express_id != null ? $quotation->premiumSum : '';
            $tariff = isset($quotation->express->tariff) && $quotation->express->tariff != 0 ? str_replace('.',',',$quotation->express->tariff) : 0;
        }

        return [
            'ClassISN' => $obj['ClassISN'],
            'SubClassISN' => $obj['SubClassISN'],
            'ObjName' => $obj['ObjName'],
            'OrderNo' => 1,
            'SubjISN' => $subjISN,
            'AGROBJECT_ADDATTR' => [
                'row' => $agrobjectAddatr
            ],
            'AGROBJCAR' => $agrobjCar,
            'AGRCOND' => [
                'row' => [
                    'RiskISN' => intval($obj['RiskISN']),   //513741,
                    'InsClassISN' => intval($obj['InsClassISN']),
                    'DateSign' => date('d.m.Y', strtotime($order['contractDate']['sig'])), //date('d.m.Y', time()),
                    'DateBeg' => date('d.m.Y', strtotime($order['contractDate']['begin'])),
                    'DateEnd' => date('d.m.Y', strtotime($order['contractDate']['end'])),
                    'CurrISN' => self::DICT_CURRENCY_TENGE,
                    'CurrSumISN' => self::DICT_CURRENCY_TENGE,
                    'LimitSum' => $obj['insureSum'],
                    'LimitSumType' => 'А',
                    'PremiumSum' => intval($premSum),
                    'PremiumSumTariff' => strval($premSum),
                    'Tariff' => strval($tariff),
                    'FranchTariff' => isset($obj['franchTariff']) && $obj['franchTariff'] != null ? $obj['franchTariff'] : 0,   // если передается процент франшизы
                    'FranchType' => 'Б',
                    'FranchSum' => isset($obj['franchSum']) && $obj['franchSum'] != null ? $obj['franchSum'] : 0,    // если передается сумма франшизы
                ]
            ],
        ];
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

    public function getDictiKias($isn,$type){
        $result = [];
        array_push($result, [
            'Label' => 'Не выбрано',
            'id' => 0,
            'label' => 'Не выбрано',
            'Type' => ''
        ]);

        $kias = new Kias();
        $kias->initSystem();
        $response = $kias->getDictiList($isn);
        if (isset($response->ROWSET->row)) {
            $childIsns = [];
            foreach ($response->ROWSET->row as $row) {
                if ($type == 'attributes') {
                    if ($row->N_KIDS == '1') {
                        $child_response = $kias->getDictiList((string)$row->ISN);
                        if (isset($child_response->ROWSET->row)) {
                            foreach ($child_response->ROWSET->row as $child_row) {
                                array_push($result, [
                                    'Value' => (string)$child_row->ISN,
                                    'Label' => (string)$child_row->FULLNAME,
                                    'Type' => (string)$child_row->CODE,
                                    'NumCode' => (string)$child_row->NUMCODE,
                                    'N_Kids' => (string)$child_row->N_KIDS,
                                    'id' => (string)$child_row->ISN,
                                    'label' => (string)$child_row->ISN . " - " . (string)$row->FULLNAME . " " . (string)$child_row->FULLNAME,
                                ]);
                            }
                        } else {
                            array_push($result, [
                                'Label' => (string)$row->FULLNAME,
                                'id' => (string)$row->ISN,
                                'Value' => (string)$row->ISN,
                                'label' => (string)$row->ISN . ' - ' . (string)$row->FULLNAME,
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
                            'label' => (string)$row->ISN . ' - ' . (string)$row->FULLNAME,
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
                        'label' => (string)$row->ISN . ' - ' . (string)$row->FULLNAME,
                        'Type' => (string)$row->CODE,
                        'NumCode' => (string)$row->NUMCODE,
                        'N_Kids' => (string)$row->N_KIDS,
                    ]);
                }
            }
        }
        return $result;
    }

    public function getDictiBase($isn,$type){
        $result = [];
        array_push($result, [
            'Label' => 'Не выбрано',
            'id' => 0,
            'label' => 'Не выбрано',
            'Type' => ''
        ]);

        $dicties = Dicti::where('parent_isn',$isn)->get();
        if(count($dicties) > 0){
            foreach($dicties as $dicti){
                if ($type == 'attributes') {
                    if ($dicti->n_kids == 1) {
                        $childs = Dicti::where('parent_isn', $dicti->isn)->get();
                        if (count($childs) > 0) {
                            foreach ($childs as $child) {
                                array_push($result, [
                                    'Value' => $child->isn,
                                    'Label' => $child->fullname,
                                    'Type' => $child->code,
                                    'NumCode' => $child->numcode,
                                    'N_Kids' => $child->n_kids,
                                    'id' => $child->isn,
                                    'label' => $child->isn . " - " . (string)$dicti->fullname . " " . (string)$child->fullname,
                                ]);
                            }
                        }
                    } else {
                        array_push($result, [
                            'Label' => $dicti->fullname,
                            'id' => $dicti->isn,
                            'Value' => $dicti->isn,
                            'label' => $dicti->isn . ' - ' . (string)$dicti->fullname,
                            'Type' => $dicti->code,
                            'NumCode' => $dicti->numcode,
                            'N_Kids' => $dicti->n_kids,
                        ]);
                    }
                } else {
                    array_push($result, [
                        'Label' => $dicti->fullname,
                        'id' => $dicti->isn,
                        'Value' => $dicti->isn,
                        'label' => $dicti->isn . ' - ' . (string)$dicti->fullname,
                        'Type' => $dicti->code,
                        'NumCode' => $dicti->numcode,
                        'N_Kids' => $dicti->n_kids,
                    ]);
                }
            }
        }

        return $result;
    }

    public function sendDocs(Request $request, KiasServiceInterface $kias){
        if(count($request->file('files')) > 0){
            $product = ExpressProduct::find($request->id);
            $uploaded = [];
            if(isset($request->quotationType) && $request->quotationType == 'express'){
                $quotation = ExpressQuotation::where('calc_isn', $request->calc_isn)->first();
                $sendType = 'D';
            } else {
                $quotation = FullQuotation::where('calc_isn', $request->calc_isn)->first();
                $sendType = 'C';        //$quotation->calc_da == 1 ? 'Q' :
            }
            foreach($request->file('files') as $file) {
                $contents = $file->get();
                $extension = $file->extension();
                $filename = str_replace(' ','_',$product->name).mt_rand(1000000, 9999999).'.'.$extension;
                $filePath = "products/{$filename}";
                if(Storage::disk('local')->put("/public/{$filePath}", $contents)) {
                    array_push($uploaded, [
                        'file' => '/public/products/' . $filename,
                        'originalName' => $file->getClientOriginalName()
                    ]);
                }

                $calc_isn  = str_replace('-','',$request->calc_isn);
                if(isset($request->quotationType) && $request->quotationType == 'express'){
                    $calc_isn  = $quotation->nshb_doc != null ? $quotation->nshb_doc : null;
                }
                $file = Storage::get('/public/products/'.$filename);
                try {
                    $results = $kias->saveAttachment(
                        $calc_isn,
                        basename($filename),
                        base64_encode($file),
                        $sendType
                    );

                    if(isset($results->error)){
                        return response()->json([
                            'success' => false,
                            'error' => 'Ошибка загрузки файла, обратитесь к системному администратору',  //(string)$results->error->text
                        ]);
                    }

                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'result' => $e->getMessage()
                    ]);
                }
            }
            $quotation->docs = json_encode($uploaded);
            $quotation->save();

            if(isset($request->quotationType) && $request->quotationType == 'express'){
                if($quotation->nshb_doc != null) {
                    $setDocStatus = $kias->getOrSetDocs($quotation->nshb_doc, 1, 2522);

                    if(isset($setDocStatus->error)){
                        return response()->json([
                            'success' => false,
                            'error' => (string)$setDocStatus->error->fulltext
                        ]);
                    }

                    if(isset($setDocStatus->Status)){
                        $quotation->nshb_status = (int)$setDocStatus->Status;
                        $quotation->save();
                    }
                }
            }
        }
        return response()->json([
            'success' => true,
            'error' => ''
        ]);
    }

    public function getPrintableFormList(Request $request, KiasServiceInterface $kias){
        $order = FullQuotation::where('contract_number',$request->contract_number)->first();
        $response = $kias->getPrintableDocumentList($order->kias_id);
        $success = false;

        if(isset($response->ROWSET->row)){
            $success = true;
        }

        return response()->json([
            'success' => $success,
            'error' => isset($response->error) ? $response->error->text : [],
            'printableForms' =>isset($response->ROWSET->row) ? (array)$response->ROWSET : [],
        ]);
    }

    public function getPrintableForm(Request $request, KiasServiceInterface $kias){
        $order = FullQuotation::where('contract_number',$request->contract_number)->first();
        $response = $kias->getPrintableDocument($order->kias_id ,$request->temp, $request->classisn);

        if (isset($response->Error)) {
            echo 'Произошла ошибка. '.$response->Error;
        }

        if (isset($response->Bytes, $response->FileName)) {
            $decoded = base64_decode($response->Bytes);
            $str = str_replace('\\', '/', (string)$response->FileName);
            $pathinfo = pathinfo($str);
            file_put_contents($pathinfo['basename'], $decoded);

            if (file_exists($pathinfo['basename'])) {
                header('Content-Description: File Transfer');
                header('Charset: UTF-8');
                //header('Content-Type: application/octet-stream');
                header('Content-Type: application/'.$pathinfo['extension']);
                header('Content-Disposition: attachment; filename="' . basename($pathinfo['basename']) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                readfile($pathinfo['basename']);
                exit;
            }
        }
    }

    public function updateProductsDicti(Request $request){
        $kias = new Kias();
        $kias->initSystem();

        $response = $kias->getDictiList($request->isn);
        if (isset($response->ROWSET->row)) {
            $oldDicti = Dicti::where('parent_isn', $request->isn)->delete();
            $childIsns = [];
            DB::table('dicti')->where('parent_isn', $request->isn)->delete();
            foreach ($response->ROWSET->row as $row) {
                $dicti = new Dicti;
                $dicti->isn = (string)$row->ISN;
                $dicti->fullname = (string)$row->FULLNAME;
                $dicti->code = (string)$row->CODE;
                $dicti->numcode = (string)$row->NUMCODE;
                $dicti->n_kids = (string)$row->N_KIDS;
                $dicti->parent_isn = $request->isn;
                $dicti->save();
            }

            if ($request->type == 'attributes') {
                $this->updateNkids($request->isn);
            }

            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateNkids($parent){
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
    }

    public function updateDocumentStatus(Request $request,KiasServiceInterface $kias){
        $nshb_status = $kias->getOrSetDocs($request->isn, 2, null);
        if(isset($nshb_status->error)){
            return response()->json([
                'success' => false,
                'error' => $nshb_status->error->text
            ]);
        }
        if(isset($nshb_status->Status)){
            $quotation = ExpressQuotation::find($request->id);
            $quotation->nshb_status = $status = (int)$nshb_status->Status;
            if($quotation->save()){
                return response()->json([
                    'success' => true,
                    'status' => $status
                ]);
            }
        }
    }

    public function updateFullStatus(Request $request,KiasServiceInterface $kias){
        $quotation = FullQuotation::find($request->id);
        $getStatus = $kias->getAgrStatus($quotation->calc_isn);     // Берем статус из киаса
        if(isset($getStatus->error)){                               // Если вернулась ошибка, записываем первоначальный статус
            return response()->json([
                'success' => false,
                'error' => (string)$getStatus->error->text
            ]);
        } else {
            if(isset($getStatus->Product) && $getStatus->Product == $quotation->product_isn){
                $quotation->status = $status = (int)$getStatus->StatusISN;
                $quotation->status_name = (string)$getStatus->Status;
                if($quotation->save()){
                    return response()->json([
                        'success' => true,
                        'status' => $status
                    ]);
                }
            }
        }
    }

    public function sendToInspection(Request $request,KiasServiceInterface $kias){
        $inspection = $request->inspection;

        $dateTime = date('d.m.Y',strtotime($inspection['date'])).' '.$inspection['time'];
        if($inspection['type'] == 'advantage'){
            $expert = $kias->sendtoExpert($request->calc_isn,$dateTime,$inspection['address']);
        } else {
            $expert = $kias->sendtoExpertSakta($request->calc_isn,$dateTime,$inspection['address']);
        }

        if(isset($expert->error)){
            return response()->json([
                'success' => false,
                'error' => (string)$expert->error[0]->text
            ]);
        }
        if(isset($expert[0]) && $expert[0] == 'OK'){
            $quotation = FullQuotation::where('calc_isn',$request->calc_isn)->first();
            //$quotation->inspection_isn = $isn = (int)$expert->ISN;
            $quotation->inspection_type = $inspection['type'];
            $quotation->inspection_date = date('d.m.Y',strtotime($inspection['date']));
            $quotation->inspection_time = $inspection['time'];
            $quotation->inspection_address = $inspection['address'];

            if($quotation->save()){
                return response()->json([
                    'success' => true,
                    'inspection' => (string)$expert[0]
                ]);
            }
        }
    }

    public function getReport(Request $request){
        if(isset($request->type) && $request->type == 'full'){
            $quotations = FullQuotation::all();
        } else {
            $quotations = ExpressQuotation::all();
        }
    }
}
