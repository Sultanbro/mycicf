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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Answer;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\NotificationController;
use App\Library\Services\Kias;
use App\Mail\EmailAmazonSes;

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
     public function  getChiefsRequest(Request $request, KiasServiceInterface $kiasService){
//         (new NotificationController())->sendRecruitingNotify(506791);
//
//         return response()->json([
//             'success' => false,
//             'result' => []
//         ]);

        $requests = Recruiting::all();
        foreach ($requests as $req){
            $req->unit_structural_name_and_city = $req->getBranchName($req->unit_structural_name_and_city);
//            $req->name_of_post = $req->getBranchNameByIsn($req->name_of_post, $kiasService);
//            $req->reason_to_recruiting = $req->getBranchNameByIsn($req->reason_to_recruiting, $kiasService);
//            $req->desired_age = $req->getBranchNameByIsn($req->desired_age, $kiasService);
//            $req->sex = $req->getBranchNameByIsn($req->sex, $kiasService);
//            $req->education = $req->getBranchNameByIsn($req->education, $kiasService);
//            $req->work_experience = $req->getBranchNameByIsn($req->work_experience, $kiasService);
//            $req->is_he_was_boss = $req->getBranchNameByIsn($req->is_he_was_boss, $kiasService);
//            $req->type_of_hire = $req->getBranchNameByIsn($req->type_of_hire, $kiasService);
//            $req->perspective_to_candidate = $req->getBranchNameByIsn($req->perspective_to_candidate, $kiasService);
//            $req->computer_knowing = $req->getBranchNameByIsn($req->computer_knowing, $kiasService);
//            $req->motivation = $req->getBranchNameByIsn($req->motivation, $kiasService);
//            $req->job_chart = $req->getBranchNameByIsn($req->job_chart, $kiasService);
//            $req->have_car = $req->getBranchNameByIsn($req->have_car, $kiasService);
//            $req->driver_category = $req->getBranchNameByIsn($req->driver_category, $kiasService);
            $req->name_of_post = $req->getChiefsDicti($req->name_of_post);
            $req->reason_to_recruiting = $req->getChiefsDicti($req->reason_to_recruiting);
            $req->desired_age = $req->getChiefsDicti($req->desired_age);
//            $req->sex = $req->getChiefsDicti($req->sex);
            $req->education = $req->getChiefsDicti($req->education);
            $req->work_experience = $req->getChiefsDicti($req->work_experience);
            $req->is_he_was_boss = $req->getChiefsDicti($req->is_he_was_boss);
            $req->type_of_hire = $req->getChiefsDicti($req->type_of_hire);
            $req->perspective_to_candidate = $req->getChiefsDicti($req->perspective_to_candidate);
            $req->computer_knowing = $req->getChiefsDicti($req->computer_knowing);
            $req->motivation = $req->getChiefsDicti($req->motivation);
            $req->job_chart = $req->getChiefsDicti($req->job_chart);
            $req->have_car = $req->getChiefsDicti($req->have_car);
            $req->driver_category = $req->getChiefsDicti($req->driver_category);
        }
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
        $result = Recruiting::all();
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
        $cData = json_decode($request->candidatsData);
        if($cData->manualFullname == '' || $cData->manualPhoneNumber == '' || $cData->manualIIN == '' || $request->postDocuments == null || !isset($request->postDocuments) || isset($request->postDocuments) && sizeof($request->postDocuments) === 0){
            $error = 'Добавьте вложение';
            $success = false;
            return [
                'error' => $error,
                'success' => $success
            ];
        }
        $candidats_data = RecruitingCandidatesData::where('recruiting_id',$cData->recruitingId)->first();
        if(!isset($candidats_data->id)) {
            $candidats_data = new RecruitingCandidatesData();
        }
//        $candidats_data->candidats_phone_number = $request->candidatsData['cityAdress'];
        $candidats_data->recruiting_id = $cData->recruitingId;
        $candidats_data->candidate_fullname = $cData->manualFullname;
        $candidats_data->candidate_iin = $cData->manualIIN;
        $candidats_data->candidate_phone_number = $cData->manualPhoneNumber;
        $candidats_data->responsible_recruiter = $cData->recruiterFullname;


        if(!$candidats_data->save()){
            return response()->json([
                'success' => false,
                'error' => 'Ошибка'
            ]);
        } else {
            if(isset($request->postDocuments)) {
                foreach($request->postDocuments as $file) {
                    $fileName = $file->getClientOriginalName();
                    $content = file_get_contents($file->getRealPath());
                    Storage::disk('local')->put("public/candidate_data/$candidats_data->id/$fileName", $content);
                }
            }
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
        $rec_data->staging_internship = $request->recruitingData['internshipResult'];
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
        $this->TestMail();

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
    public function getCandidatsDataRequest(Request $request){
        $result = RecruitingCandidatesData::pluck('recruiting_id', 'candidate_fullname')->toArray();

        $response = [];

        foreach ($result as $key => $value) {
            $data = Recruiting::where('id', $value)->first();
            $data->unit_structural_name_and_city = $data->getBranchName($data->unit_structural_name_and_city);

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
//        $result = RecruitingCandidatesData::pluck('responsible_recruiter', 'recruiting_id')->toArray();
        $result = RecruitingCandidatesData::select('recruiting_id','responsible_recruiter', 'candidate_fullname')->get()->toArray();
//        $result = RecruitingCandidatesData::pluck('candidate_fullname', 'recruiting_id')->toArray();

        $response = [];

        //dd($result);

        foreach ($result as $res) {
            $data = Recruiting::where('id', $res['recruiting_id'])->first();

            $data->name_of_post = $data->getChiefsDicti($data->name_of_post);
//            $data->structural_unit = $data->getChiefsDicti($data->structural_unit);
            $data->unit_structural_name_and_city = $data->getBranchName($data->unit_structural_name_and_city);
            array_push($response, [
                'fullname' => $res['responsible_recruiter'],
                'candidate_fullname' => $res['candidate_fullname'],
                'chiefs_fullname' => $data->chiefs_fullname,
                'chiefs_duty' => $data->chiefs_duty,
                'interview_result' => $data->interview_result,
                'application_status' => $data->application_status,
                'date_of_conclusion_dou' => $data->date_of_conclusion_dou,
                'unit_structural_name_and_city' => $data->unit_structural_name_and_city,
                'name_of_post' => $data->name_of_post,
            ]);
            $data->name_of_post = $data->getChiefsDicti($data->name_of_post);
            $data->unit_structural_name_and_city = $data->getChiefsDicti($data->structural_unit);
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
        $results = [];
        $result = RecruitingCandidatesData::get();
        if($result){
            foreach($result as $res){
                $res['documents'] = $res->getDocuments();
                array_push($results,$res);
            }
        }
        return response()->json([
            'success' => $results ? true : false,
            'result' => $result
        ]);
    }
    public function testKiasDima(Request $request, KiasServiceInterface $kias){
        $Test = $kias->getTestKiadData();
        dd($Test);
    }
    public function testMail(){
        try{
            Mail::to('EFilimonova@cic.kz')->send(new EmailAmazonSes([
                'title' => __('shared.your_tour_polis'),
                'tourId' => 1,
            ]
//                'tour',
//                [
//                    'policy.pdf' => '',
//                    'insurer_memo.pdf' => '',
//                    'mst_part-2.pdf' => '',
//                ]
            ));


        }
        catch (SesException $e){
            echo $e->getMessage();
            return false;
        }

        //                внутрь try
        //'background_image' => asset('images/product/mst_product.png'),
//                'htmlTitle' => 'tst title ',
//                'greeting' => "Уважаемый(-ая)!",
//                'wish' => 'Желаем Вам увлекательной, эмоциональной и безопасной поездки!',


            //$this->email_sent = 1;
            //$this->save();
            //return true;
            // dd('sended');










/*        $q = $to_name = 'My.cic.kz';
//        $to_email = 'zuaxxx@gmail.com';
        $to_email = 'DJumagulov@cic.kz';
        $data = array('header'=>"Данные в разделе Рекрутинг были обновлены", "body" => "Пожалуйста, проверьте my.cic.kz");
//        Mail::send('emails.recruiting', $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
//            $message->from(env('MAIL_USERNAME'), 'Artisans Web');
//        });
        Mail::send('emails.recruiting', $data, function($message) use ($to_email, $q) {
            $message->to($to_email)->subject($q);
        });


        //        $name = $request->name;
//        $email = $request->email;
//        $msg = $request->msg;
//        $form = $request->get('form');
//
//        dd($form);
//
//        $authEmail = Auth::user()->email;
//
//
//        Mail::to('DJumagulov@cic.kz')->send(new \App\Mail\RecruitingMail($name, $email, $msg));
*/
    }
    public function saveCandidat(Request $request,KiasServiceInterface $kias){
//        $candidate = $request->candidate;


//        $language = new RecruitingLanguage();

//        Mail::to('DJumagulov@cic.kz')->send(new \App\Mail\RecruitingMail('asdadas'));

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
//        $recruiting->email_chief = authEmail;

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

    public function getRecruitingDicti(Request $request, KiasServiceInterface $kias){
        $kias = new Kias();
        $kias->initSystem();
        $structuralUnitAndCityIsn = $request->structuralUnitAndCity;
        $nameOfPostIsn = $request->nameOfPost;
        $reasonIsn = $request->reason;
        $desiredAgeIsn = $request->desiredAge;
//        $sexIsn = $request->sex;
        $educationIsn = $request->education;
        $workExpirienceIsn = $request->workExpirience;
        $isHeWasBossIsn = $request->isHeWasBoss;
        $typeOfHireIsn = $request->typeOfHire;
        $connectIsn = $request->connect;
        $computerKnowingIsn = $request->computerKnowing;
        $languageIsn = $request->language;
        $motivationIsn = $request->motivation;
        $jobTimeIsn = $request->jobTime;
        $haveCarIsn = $request->haveCar;
        $driverCardIsn = $request->driverCard;
        $socPacketIsn = $request->socPacket;


        $responseStructuralUnitAndCity = $kias->getDictiList($structuralUnitAndCityIsn);
        $responseNameOfPost = $kias->getDictiList($nameOfPostIsn);
        $responseReason = $kias->getDictiList($reasonIsn);
        $responseDesiredAge = $kias->getDictiList($desiredAgeIsn);
//        $responseSex = $kias->getDictiList($sexIsn);
        $responseEducation = $kias->getDictiList($educationIsn);
        $responseWorkExpirience = $kias->getDictiList($workExpirienceIsn);
        $responseIsHeWasBoss = $kias->getDictiList($isHeWasBossIsn);
        $responseTypeOfHire = $kias->getDictiList($typeOfHireIsn);
        $responseComputerKnowing = $kias->getDictiList($computerKnowingIsn);
        $responseLanguage = $kias->getDictiList($languageIsn);
        $responseMotivation = $kias->getDictiList($motivationIsn);
        $responseHaveCar = $kias->getDictiList($haveCarIsn);
        $responseDriverCard = $kias->getDictiList($driverCardIsn);
        $responseJobTime = $kias->getDictiList($jobTimeIsn);
        $responseSocPacket = $kias->getDictiList($socPacketIsn);
        $responseConnect = $kias->getDictiList($connectIsn);
        $responseReason = $kias->getDictiList($reasonIsn);

        $resultStructuralUnitAndCity = [];
        $resultNameOfPost = [];
        $resultReason = [];
        $resultDesiredAge = [];
//        $resultSex = [];
        $resultEducation = [];
        $resultWorkExpirience = [];
        $resultIsHeWasBoss = [];
        $resultTypeOfHire = [];
        $resultConnect = [];
        $resultComputerKnowing = [];
        $resultLanguage = [];
        $resultMotivation = [];
        $resultJobTime = [];
        $resultHaveCar = [];
        $resultDriverCard = [];
        $resultSocPacket = [];
        $success = false;

        if(isset($responseDriverCard->ROWSET->row)){
            foreach ($responseDriverCard->ROWSET->row as $row){
                array_push($resultDriverCard, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseJobTime->ROWSET->row)){
            foreach ($responseJobTime->ROWSET->row as $row){
                array_push($resultJobTime, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseSocPacket->ROWSET->row)){
            foreach ($responseSocPacket->ROWSET->row as $row){
                array_push($resultSocPacket, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseConnect->ROWSET->row)){
            foreach ($responseConnect->ROWSET->row as $row){
                array_push($resultConnect, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseReason->ROWSET->row)){
            foreach ($responseReason->ROWSET->row as $row){
                array_push($resultReason, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseStructuralUnitAndCity->ROWSET->row)){
            foreach ($responseStructuralUnitAndCity->ROWSET->row as $row){
                array_push($resultStructuralUnitAndCity, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseNameOfPost->ROWSET->row)){
            foreach ($responseNameOfPost->ROWSET->row as $row){
                array_push($resultNameOfPost, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseDesiredAge->ROWSET->row)){
            foreach ($responseDesiredAge->ROWSET->row as $row){
                array_push($resultDesiredAge, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

//        if(isset($responseSex->ROWSET->row)){
//            foreach ($responseSex->ROWSET->row as $row){
//                array_push($resultSex, [
//                    'Value' => $row->ISN,
//                    'Label' => $row->FULLNAME
//                ]);
//            }
//
//            $success = true;
//        }

        if(isset($responseEducation->ROWSET->row)){
            foreach ($responseEducation->ROWSET->row as $row){
                array_push($resultEducation, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseWorkExpirience->ROWSET->row)){
            foreach ($responseWorkExpirience->ROWSET->row as $row){
                array_push($resultWorkExpirience, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseIsHeWasBoss->ROWSET->row)){
            foreach ($responseIsHeWasBoss->ROWSET->row as $row){
                array_push($resultIsHeWasBoss, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseTypeOfHire->ROWSET->row)){
            foreach ($responseTypeOfHire->ROWSET->row as $row){
                array_push($resultTypeOfHire, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseComputerKnowing->ROWSET->row)){
            foreach ($responseComputerKnowing->ROWSET->row as $row){
                array_push($resultComputerKnowing, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseLanguage->ROWSET->row)){
            foreach ($responseLanguage->ROWSET->row as $row){
                array_push($resultLanguage, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseMotivation->ROWSET->row)){
            foreach ($responseMotivation->ROWSET->row as $row){
                array_push($resultMotivation, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        if(isset($responseHaveCar->ROWSET->row)){
            foreach ($responseHaveCar->ROWSET->row as $row){
                array_push($resultHaveCar, [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ]);
            }

            $success = true;
        }

        return response()->json([
            'driverCard' => $resultDriverCard,
            'jobTime' => $resultJobTime,
            'socPacket' => $resultSocPacket,
            'connect' => $resultConnect,
            'reason' => $resultReason,
            'structuralUnitAndCity' => $resultStructuralUnitAndCity,
            'nameOfPost' => $resultNameOfPost,
            'desiredAge' => $resultDesiredAge,
//            'sex' => $resultSex,
            'education' => $resultEducation,
            'workExpirience' => $resultWorkExpirience,
            'isHeWasBoss' => $resultIsHeWasBoss,
            'typeOfHire' => $resultTypeOfHire,
            'computerKnowing' => $resultComputerKnowing,
            'language' => $resultLanguage,
            'motivation' => $resultMotivation,
            'haveCar' => $resultHaveCar,
            'success' => $success,
        ]);
    }
}
