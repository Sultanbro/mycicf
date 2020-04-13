<?php

namespace App\Http\Controllers;

use App\ExpressProduct;
use App\FullProduct;
use App\FullQuotation;
use App\FullConstructor;
use App\InsProduct;
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

    public function setFullQuotationData(Request $request){
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

    public function fullQuotationConstructor ($id){
        $product = FullProduct::find($id);
        $constructor = FullConstructor::where('product_id',$id)->first();
        $participants = $constructor->participants ?? json_encode([]);
        $objects = $constructor->objects ?? json_encode([]);
        $attributes = $constructor->attributes ?? json_encode([]);
        return view('products.create.full_constructor',compact(['product','participants','objects','attributes']));
    }

    public function setFullQuotationConstructor(Request $request){
        try{
            $constructor = FullConstructor::find($request->id) ?? new FullConstructor();
            $constructor->product_id = $request->id;
            $constructor->product_isn = $request->product_isn;
            $constructor->user_isn = Auth::user()->ISN;
            $constructor->participants = json_encode($request->participants);
            $constructor->objects = json_encode($request->objects);
            $constructor->attributes = json_encode($request->attr);
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
            $result = (new SiteController())->getDictiList((string)$request->ISN);
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

    public function fullQuotationList(){
        $products = [];
        foreach (FullProduct::all() as $product){
            array_push($products, [
                'url' => "/full-quotation/calc/{$product->id}/0",
                'name' => $product->name,
            ]);
        }
        return view('fullquotation.list', compact('products'));
    }

    public function fullQuotationCreate(Request $request){
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

    public function fullQuotation($ID,$quotationId,Request $request){
        if(($model = FullProduct::find($ID)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }

        return view('fullquotation.create', compact(['ID','quotationId']));
    }

    public function getFullQuotationAttributes(Request $request, KiasServiceInterface $kias){
        $ID = $request->id;
        $quotationId = $request->quotationId;
        $ProductISN = FullProduct::find($ID)->product_isn;
        $response = $kias->getFullQuotationAttributes($ProductISN);

        $expressAttr = [];
        //$subjIsn = '';
        $fromExpress = $quotationId != 0 ? FullQuotation::find($quotationId) : null;
        if($fromExpress){
            $expressAttr = (array)json_decode($fromExpress->attributes);
            //$subjIsn = json_decode($fromExpress->object_card);
        }

        $attributes = [];
        if(isset($response->ROWSET->row)){
            foreach ($response->ROWSET->row as $row){
                $value = count($expressAttr) > 0 ? $expressAttr[(string)$row->AttrISN]->Value ?? null : null;
                array_push($attributes, [
                    'AttrISN' => (string)$row->AttrISN,
                    'Type' => (string)$row->TypeValue,
                    'Label' => (string)$row->AttrName,
                    'ParentISN' => (string)$row->NumCode,
                    'Value' => $value,
                    'Remark' => null,
                    'Childs' => (new SiteController())->getDictiList((string)$row->NumCode)
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'attributes' => $attributes
        ]);
    }

    public function fullQuotationCalc(Request $request, KiasServiceInterface $kias){
        $product_id = $request->id;
        if(($model = FullProduct::find($product_id)) === null){
            return response()->json([
                'success' => false,
                'error' => 'Продукт который вы хотите рассчитать не найден'
            ]);
        }

        $prodIsn = $model->product_isn;
        $subjISN = $request->subjISN;
        $participants = $this->participantsToKiasAddAttr($request->all());
        $attributes = $this->attributesToKiasAddAttr($request->all()['attributes']);

        print '<pre>';print_r($participants);print '</pre>';exit();


        $response = $kias->fullQuotationCalculator($prodIsn, $subjISN, $attributes);
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
}
