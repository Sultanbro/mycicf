<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\Item;
use App\Library\Services\KiasServiceInterface;
use App\Recruiting;
use App\CandidatsData;
use Illuminate\Http\Request;
use App\Branch;
use App\Answer;

class RecruitingController extends Controller
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

    public function getRequests(Request $request){
        $requests = Recruiting::all();
//        Как вариант вытаскивать конкретные значения
//        $requests = Recruiting::where('sex','Мужской')->where('education','Высшее')->first();

        return response()->json([
            'success' => $requests ? true : false,
            'result' => $requests
        ]);
    }
    public function  getChiefsRequest(Request $request){
        $requests = Recruiting::all();
        return response()->json([
            'success' => $requests ? true : false,
            'result' => $requests
        ]);
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
    public function saveCandidatsData(Request $request,KiasServiceInterface $kias){
        $candidats_data = new CandidatsData();

        $candidats_data->candidats_fullname = $request->candidatsData['manualFullname'];
        $candidats_data->candidats_iin = $request->candidatsData['manualIIN'];
        $candidats_data->candidats_phone_number = $request->candidatsData['manualPhoneNumber'];
        if(!$candidats_data->save()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
    public function  getCandidatsDataRequest(Request $request){
        $requests = CandidatsData::all();
        return response()->json([
            'success' => $requests ? true : false,
            'result' => $requests
        ]);
    }
    public function saveCandidat(Request $request,KiasServiceInterface $kias){
//        $candidate = $request->candidate;



//        $language = new RecruitingLanguage();


        $recruiting = new Recruiting();
        $recruiting->chiefs_duty = $request->candidat['chiefsDuty'];
        $recruiting->chiefs_fullname = $request->candidat['chiefsFullname'];
//        $recruiting->userAuthDepartment = $request->candidat['userAuthDepartment'];
        $recruiting->unit_structural_name_and_city = $request->candidat['cityAdressSelect'];
        $recruiting->name_of_post = $request->candidat['nameOfPostSelect'];
        $recruiting->quantity_people = $request->candidat['quantityPeople'];
        $recruiting->reason_to_recruiting = $request->candidat['ReasonToRecruitingSelect'];
        $recruiting->desired_age = $request->candidat['desiredAgeSelect'];
        $recruiting->sex = $request->candidat['sexSelect'];
        $recruiting->education = $request->candidat['educationSelect'];
        $recruiting->functional_responsobilities = $request->candidat['functionalResponsobilities'];
        $recruiting->work_expirience = $request->candidat['workExpirienceSelect'];
        $recruiting->is_he_was_boss = $request->candidat['isHeWasBossSelect'];
        $recruiting->type_of_hire = $request->candidat['typeOfHireSelect'];
        $recruiting->request_to_candidat = $request->candidat['requestToCandidat'];
        $recruiting->perspective_to_candidat = $request->candidat['perspectiveToCandidatSelect'];
        $recruiting->computer_knowing = $request->candidat['computerKnowingSelect'];
        $recruiting->salary = $request->candidat['salary'];
        $recruiting->motivation = $request->candidat['motivationSelect'];
        $recruiting->job_chart = $request->candidat['jobChartSelect'];
        $recruiting->have_car = $request->candidat['haveCarSelect'];
        $recruiting->driver_category = $request->candidat['driverCategorySelect'];
        $recruiting->candidats_trait = $request->candidat['candidatsTrait'];
        $recruiting->interview_stage = $request->candidat['interviewStage'];
        if(!$recruiting->save()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);

    }
}
