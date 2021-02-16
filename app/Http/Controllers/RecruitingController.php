<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\Item;
use App\Library\Services\KiasServiceInterface;
use App\Recruiting;
use App\RecruitingCandidatesData;
use Illuminate\Http\Request;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
//    Отправка данных кандидата
    public function saveCandidatsData(Request $request,KiasServiceInterface $kias){
        $candidats_data = RecruitingCandidatesData::where('recruiting_id',$request->candidatsData['recruitingId']);
        if(!isset($candidats_data->id)) {
            $candidats_data = new RecruitingCandidatesData();
        }

//        $candidats_data->candidats_phone_number = $request->candidatsData['cityAdress'];
        $candidats_data->recruiting_id = $request->candidatsData['recruitingId'];
        $candidats_data->candidate_fullname = $request->candidatsData['manualFullname'];
        $candidats_data->candidate_iin = $request->candidatsData['manualIIN'];
        $candidats_data->candidate_phone_number = $request->candidatsData['manualPhoneNumber'];
        $candidats_data->responsible_recruiter = $request->candidatsData['recruiterFullname'];
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

    public function saveRecruitingData(Request $request,KiasServiceInterface $kias){
        $rec_data = Recruiting::where('id',  $request->recruitingData['id'])->first();

        $rec_data->interview_date = $request->recruitingData['interviewDate'];
        $rec_data->interview_time = $request->recruitingData['interviewTime'];
        $rec_data->interview_result = $request->recruitingData['interviewResult'];
        $rec_data->date_of_internship = $request->recruitingData['dateOfInternship'];
        $rec_data->date_of_conclusion_dou = $request->recruitingData['dateOfConclusionDOU'];
        $rec_data->date_of_conclusion_td = $request->recruitingData['dateOfConclusionTD'];
        $rec_data->commentary = $request->recruitingData['commentary'];
        $rec_data->application_status = $request->recruitingData['status'];
//        $rec_data->recruiting_id = $request->recruitingData['recruitingId'];
//        $rec_data->candidats_fullname = $request->recruitingData['manualFullname'];
//        $rec_data->candidats_iin = $request->recruitingData['manualIIN'];
//        $candidats_data->candidats_phone_number = $request->candidatsData['manualPhoneNumber'];
        if(!$rec_data->save()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function testt1(Request $request){
        $recruiting = new Recruiting();
        $recruiting->candidats_iin = $request->candidatsData['manualIIN'];
        if(!$recruiting->update()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        }
//        if($request->candidat['cityAdressSelect'] == '1'){
//
//        }
        return response()->json([
            'success' => true,
        ]);
    }
    public function  getCandidatsDataRequest(Request $request){
        $result = RecruitingCandidatesData::pluck('recruiting_id', 'candidate_fullname')->toArray();

        $response = [];

        foreach ($result as $key => $value) {
            $data = Recruiting::where('id', $value)->first();

            array_push($response, [
                'fullname' => $key,
                'id' => $data->id,
                'unit_structural_name_and_city' => $data->unit_structural_name_and_city,
                'interview_date' => $data->interview_date,
                'interview_result' => $data->interview_result,
            ]);
        }

        return response()->json([
            'success' => $result ? true : false,
            'result' => $response
        ]);
    }
    public function  getResultRequest(Request $request){
        $result = RecruitingCandidatesData::pluck('responsible_recruiter', 'recruiting_id')->toArray();

        $response = [];

        foreach ($result as $key => $value) {
            $data = Recruiting::where('id', $key)->first();

            array_push($response, [
                'fullname' => $value,
                'chiefs_fullname' => $data->chiefs_fullname,
                'chiefs_duty' => $data->chiefs_duty,
                'interview_result' => $data->interview_result,
                'application_status' => $data->application_status,
                'date_of_conclusion_dou' => $data->date_of_conclusion_dou,
            ]);
        }

        return response()->json([
            'success' => $result ? true : false,
            'result' => $response
        ]);
    }
//    Тут должно быть сохранение резюме
    public function getResumeRecruiting(Request $request){
        dd($request->all());

        $requests = RecruitingCandidatesData::all();

        return response()->json([
            'success' => $requests ? true : false,
            'result' => $requests
        ]);
    }
    public function getCandidatsDataManualRequest(Request $request){
//        $result = RecruitingCandidatesData::pluck('recruiting_id', 'candidate_fullname')->toArray();

//        $req = RecruitingCandidatesData::all();

        $result = RecruitingCandidatesData::all();
        return response()->json([
            'success' => $result ? true : false,
            'result' => $result
        ]);
    }
    public function testKiasDima(Request $request, KiasServiceInterface $kias){
        $Test = $kias->getTestKiadData();
        dd($Test);
    }
    public function saveCandidat(Request $request,KiasServiceInterface $kias){
//        $candidate = $request->candidate;


//        $language = new RecruitingLanguage();

        if($request->candidat['cityAdressSelect'] == '1'){

        }
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
        $recruiting->functional_responsibilities = $request->candidat['functionalResponsobilities'];
        $recruiting->work_experience = $request->candidat['workExpirienceSelect'];
        $recruiting->is_he_was_boss = $request->candidat['isHeWasBossSelect'];
        $recruiting->type_of_hire = $request->candidat['typeOfHireSelect'];
        $recruiting->request_to_candidate = $request->candidat['requestToCandidat'];
        $recruiting->perspective_to_candidate = $request->candidat['perspectiveToCandidatSelect'];
        $recruiting->computer_knowing = $request->candidat['computerKnowingSelect'];
        $recruiting->salary = $request->candidat['salary'];
        $recruiting->motivation = $request->candidat['motivationSelect'];
        $recruiting->job_chart = $request->candidat['jobChartSelect'];
        $recruiting->have_car = $request->candidat['haveCarSelect'];
        $recruiting->driver_category = $request->candidat['driverCategorySelect'];
        $recruiting->candidates_trait = $request->candidat['candidatsTrait'];
        $recruiting->interview_stage = $request->candidat['interviewStage'];
        $recruiting->application_status = $request->candidat['status'];

//        $recruiting->candidates_fullname = $request->candidat['manualFullname'];
//        $recruiting->candidates_iin = $request->candidat['manualIIN'];
//        $recruiting->candidates_phone_number = $request->candidat['manualPhoneNumber'];
        if(!$recruiting->save()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        }
//        if($request->candidat['cityAdressSelect'] == '1'){
//
//        }
        return response()->json([
            'success' => true,
        ]);

    }
}
