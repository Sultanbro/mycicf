<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\Item;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use App\Branch;
use App\Answer;

class NameController extends Controller
{
    public function getItemsList(Request $request) {

        $items = DocumentationStructure::where('parent_id', $request->parentId)->get();

        $result = [];

        foreach ($items as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'url' => $item->url,
                'icon_url' => $item->icon_url,
                'childs' => [],
                'opened' => false
            ]);
        }
        return $result;
    }

    public function getView() {
        return view('name');
    }
    public function getRecruiting() {
        return view('recruiting');
    }
    public function getContent(){
        $success = false;
        $result = Branch::get();
        if($result){
            $success = true;
        }

        return response()->json([
            'success' => $success,
            'result' => $result
        ]);
    }

    public function getTestData(Request $request){
        $request->salary;


        $success = false;
        $result = Branch::get();
        if(count($result) > 0){
            $success = true;
        }
        return response()->json([
           'success' => $success,
           'result' => $result
        ]);
    }
    public function sendRequest(){
        $success = false;
        $result = Recruiting::get();
        if ($result){
            $success = true;
        }
        return response()->json([
            'success' => $success,
            'result' => $result,
        ]);
    }
    public function getCoordinationInfo(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = "";
        $docIsn = $request->docIsn;
        $response = $kias->getCoordination($docIsn);
        if($response->error){
            $success = false;
            $error .= (string)$response->error->text;
            $result = [
                'success' => $success,
                'error' => (string)$error
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        $responseData = [];
        $attributes = [];
        $coordinations = [];
        foreach ((array)$response as $key => $value){
            if($value != "0"){
                if(in_array((string)$key, array_keys($this->attributeKeys())))
                {
                    array_push($attributes, [
                        'Name' => $this->attributeKeys()[$key],
                        'Value' => (string)$value
                    ]);
                }
                elseif($key === self::AC_ATTRIBUTES_LABEL)
                {
                    foreach ($value->row as $attribute) {
                        if($attribute->Value !== "0"){
                            array_push($attributes, [
                                'Name' => (string)$attribute->AttrName,
                                'Value' => (string)$attribute->Value,
                            ]);
                        }
                    }
                }
                elseif($key === self::COORDINATIONS_LABEL)
                {
                    foreach ($value->row as $coordination) {
                        array_push($coordinations, [
                            'FullName' => (string)$coordination->SubjNAME,
                            'Duty' => (string)$coordination->DutyName,
                            'Dept' => (string)$coordination->DeptName,
                            'Solution' => (string)$coordination->Solution,
                            'Date' => (string)$coordination->datesolution,
                            'Remark' => (string)$coordination->remark,
                            'ISN' => (string)$coordination->ISN,
                        ]);
                    }
                }
                elseif(in_array($key,$this->getCoordinationAttributes()))
                {
                    $responseData = array_merge($responseData , [
                        (string)$key => (string)$value
                    ]);
                }
                elseif($key == 'AttrLimit'){
                    $LimitISN = $value;
                }
                elseif($key == "KV"){
                    if((string)$response->DocClass == "787161") {
                        foreach ($value->row as $kvAttrs) {
                            foreach ($kvAttrs as $attrKey => $attrValue) {
                                if (in_array($attrKey, array_keys($this->getKVAttributes())) && (string)$attrValue !== "0") {
                                    array_push($attributes, [
                                        'Name' => (string)$this->getKVAttributes()[$attrKey],
                                        'Value' => (string)$attrValue,
                                    ]);
                                }
                            }
                            array_push($attributes, [
                                'Name' => 'Остальные категории',
                                'Value' => 0,
                            ]);
                        }
                    }
                }
            }
        }
        $responseData = array_merge($responseData, [
            'Attributes' => $attributes,
            'Coordinations' => $coordinations,
            'Limit' => $LimitISN ?? null,
        ]);
        $result = [
            'success' => $success,
            'error' => $error,
            'response' => $responseData,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }
}
