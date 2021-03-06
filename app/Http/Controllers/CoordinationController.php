<?php

namespace App\Http\Controllers;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Notification;
use Debugbar;
use Illuminate\Http\Request;
use App\Events\NewPost;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CoordinationController extends Controller
{
    const AC_ATTRIBUTES_LABEL = 'ACattr';
    const COORDINATIONS_LABEL = 'Coordination';
    public function index(){
        return view('coordination');
    }

    public function getCoordinationList(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = null;
        $ISN = $request->isn;
        $key = 'Kias::myCoordinationList::' . $ISN;
        $ttl = now()->addMinutes(10);
        Debugbar::startMeasure($key);
        $response = $kias->myCoordinationList($ISN);
        Debugbar::stopMeasure($key);
        if($response->error){
            $success = false;
            $error = (string)$response->text;
        }
        $AC = $SP = $SZ = $KV = $OL = $AD = $RV = $VC = $other = null;
        if($response->AC->row[0]->docdate != 0){
            $AC = array();
            foreach ($response->AC->row as $row) {
                array_push($AC, [
                    'ISN' => (integer)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'ClassPovestka' => (string)$row->ClassPovestka,
                    'Povestka' => (string)$row->Povestka
                ]);
            }
        }

        if($response->SP->row[0]->docdate != 0){
            $SP = array();
            foreach ($response->SP->row as $row) {
                array_push($SP, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->SZ->row[0]->docdate != 0){
            $SZ = array();
            foreach ($response->SZ->row as $row) {
                array_push($SZ, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'sz_isn' => (string)$row->SzISN,
                    'sz_class_isn' => (string)$row->SzClassISN
                ]);
            }
        }

        if($response->KV->row[0]->docdate != 0){
            $KV = array();
            foreach ($response->KV->row as $row) {
                array_push($KV, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->OL->row[0]->docdate != 0){
            $OL = array();
            foreach ($response->OL->row as $row){
                array_push($OL, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'DeptName' => (string)$row->DeptName,
                ]);
            }
        }

        if($response->AD->row[0]->period != 0){
            $AD = array();
            foreach ($response->AD->row as $row){
                array_push($AD, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->period,
                    'days' => (string)$row->cnt
                ]);
            }
        }

        if($response->RV->row[0]->docpaydate != 0){
            $RV = array();
            foreach ($response->RV->row as $row) {
                array_push($RV, [
                    'ISN' => (string)$row->ISN,
                    'empl' => (string)$row->empl,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'PayDate' => (string)$row->docpaydate,
                ]);
            }
        }
        //1256401
        if($response->BK->row[0]->docdate != 0){
            $VC = array();
            foreach ($response->BK->row as $row) {
                array_push($VC, [
                    'ISN' => (integer)$row->ISN,
                    'type' => (string)$row->type,
                    'curator' => (string)$row->curator,
                    'DeptName' => (string)$row->DeptName,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                ]);
            }
        }

        if($response->other->row[0]->docdate != 0){
            $other = array();
            foreach ($response->other->row as $row){
                array_push($other, [
                    'ISN' => (string)$row->ISN,
                    'type' => (string)$row->Type,
                    'curator' => (string)$row->curator,
                    'id' => (string)$row->id,
                    'docdate' => (string)$row->docdate,
                    'DeptName' => (string)$row->DeptName,
                    'ClassISN' => (string)$row->ClassISN,
                    'RefDocISN' => (string)$row->RefDocISN,
                    'RefClassISN' => (string)$row->RefClassISN,
                ]);
            }
        }

        $result = [
            'success' => $success,
            'error' => $error,
            'result' => array(
                'AC' => $AC,
                'SP' => $SP,
                'SZ' => $SZ,
                'KV' => $KV,
                'OL' => $OL,
                'AD' => $AD,
                'RV' => $RV,
                'VC' => $VC,
                'other' => $other
            )
        ];

        return response()->json($result)->withCallback($request->input('callback'));
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
                            //'RefAgrISN' => isset($coordination->RefAgrISN) ? (string)$coordination->RefAgrISN : 0,
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
            'link' => (string)$response->Link
        ]);
        $result = [
            'success' => $success,
            'error' => $error,
            'response' => $responseData,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function setCoordination(Request $request){
        $success = true;
        $error = '';
        $kias = new Kias();
        $kias->initSystem();
        $response = $kias->setCoordination($request->DocISN, $request->ISN, $request->Solution, $request->Remark, $request->Resolution);
        if($response->error){
            $success = false;
            $error .= $response->error->fulltext;
            $result = [
                'success' => $success,
                'error' => $error,
            ];

            return response()->json($result)->withCallback($request->input('callback'));
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'result' => (string)$response->Result
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function getDocRowList(Request $request, KiasServiceInterface $kias) {
        try {
            $result = $kias->request('User_CicGetDocRowAttr', [
                'CLASSISN' => $request->class_isn,
                'DOCISN' => $request->doc_isn,
            ]);

            if(!isset($result->error))
            {
                $doc_row_list = array();
                $doc_row_inner = array();
                foreach ($result->DocRow->row as $row)
                {
                    if(!isset($doc_row_list[(string)$row->orderno])){
                        $doc_row_list[(string)$row->orderno]['fieldname'] = (string)$row->fieldname;
                    }
                    if(isset($row->classisn)) {
                        if ($row->classisn == 1784771) {
                            $doc_row_inner[(string)$row->orderno][] = array(
                                'ISN' => (string)$row->value,
                                'ID' => (string)$row->value_name != '' ? (string)$row->value_name : (string)$row->value
                            );
                        } else {
                            $doc_row_inner[(string)$row->orderno][] = (string)$row->value_name != '' ? (string)$row->value_name : (string)$row->value;
                        }
                    }
                }

                return response()->json([
                    'success' => true,
                    'doc_row_list' => $doc_row_list,
                    'doc_row_inner' => $doc_row_inner,
                ]);
            }
            else
                throw new \Exception('Данные не найдены', 400);
        }
        catch(\Exception $e) {
            return response()->json([
                'success'   => false,
                'code'      => $e->getCode(),
                'message'   => $e->getMessage()
            ]);
        }
    }

    public function attributeKeys(){
        return [
            'AttrDocType' => 'Тип СЗ',
            'AttrDocID' => 'Номер СЗ',
            'AttrDocDate' => 'Дата СЗ',
            'AttrLastDay' => 'Последний день работы',
            'AttrDocAddr' => 'Адресат',
            'AttrDocExe' => 'Исполнитель',
            'AttrDocCoor1' => 'Согласующий 1',
            'AttrDocDays' => 'Кол-во используемых дней',
            'AttrDocCountDays' => 'Общее кол-во дней',
            'AttrAmount' => 'Сумма',
        ];
    }

    public function getCoordinationAttributes(){
        return [
            'ISN',                  //ISN СЗ
            'DocClass',             //ISN типа СЗ
            'ID',                   //Номер СЗ
            'Docdate',              //Дата СЗ
            'Fullname',             //ТИП СЗ
            'Curator',              //Куратор СЗ
            'SubjName',             //Наименование страхователя
            'SubjDept',             //Департамент страхователя
            'Remark',               //Примечание листа СЗ
            'RefAgrISN',
        ];
    }

    public function getKVAttributes(){
        return [
            'dept' => 'Филиал/Подразделение',
            'curator' => 'ФИО куратора',
            'agent' => 'ФИО агента',
            'VTS_Phis' => 'ОГПО ВТС Врем.въезд',
            'VTS_Jur' => 'ОГПО ВТС Юр.лицо',
            'KBM_M' => 'КБМ M',
            'KBM_0' => 'КБМ 0',
            'KBM_1' => 'КБМ 1',
            'KBM_2' => 'КБМ 2',
            'KBM_3' => 'КБМ 3',
            'KBM_4' => 'КБМ 4',
            'KBM_5' => 'КБМ 5',
            'KBM_6' => 'КБМ 6',
            'KBM_7' => 'КБМ 7',
            'KBM_8' => 'КБМ 8',
            'KBM_9' => 'КБМ 9',
            'KBM_10' => 'КБМ 10',
            'KBM_11' => 'КБМ 11',
            'KBM_12' => 'КБМ 12',
            'KBM_13' => 'КБМ 13',
            'OGPO_PP' => 'ОГПО ПП',
            'OSE' => 'ОСЭ',
            'Notarius' => 'ОГПО ЧН',
            'OGPO_AO' => 'ОГПО АО',
            'OGPO_OO' => 'ОГПО ОО',
        ];
    }

    public function getAttachments(Request $request, KiasServiceInterface $kias){
        $response = $kias->getAttachmentsList($request->docIsn);
        $attachments = [];
        if($response->error){
            $result = [
                'success' => false,
                'error' => (string)$response->error->text,
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        if(isset($response->LIST->row)){
            foreach ($response->LIST->row as $row){
                array_push($attachments, [
                    'URL' => "/getAttachment/{$row->ISN}/{$row->REFISN}/{$row->PICTTYPE}",
                    'FileName' => (string)$row->FILENAME,
                ]);
            }
        }
        $result = [
            'success' => true,
            'error' => "",
            'attachments' => $attachments,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function saveAttachment(Request $request, KiasServiceInterface $kias){
        try{
            $success = true;
            if($request->fileType == 'base64'){
                $file = $request->file;
                $extension = isset($request->fileExt) ? $request->fileExt : '';
                $filename = 'signed_'.$request->id.'_'.Auth::user()->full_name.'.'.$extension;  //.mt_rand(1000000, 9999999);
            } else {
//                $file = $request->base64_encode($request->file);
//                $contents = $file->get();
//                $extension = $file->extension();
//                $filename = mt_rand(1000000, 9999999).'.'.$extension;
            }

            $results = $kias->saveAttachment(
                $request->isn,
                $filename,
                $file,
                $request->requestType
            );
            if(isset($results->error)){
                $success = false;
                $error = 'Ошибка загрузки файла, обратитесь к системному администратору';  //(string)$results->error->text
            }

            return response()->json([
                'success' => $success,
                'error' => isset($error) ? $error : '',
                'result' => isset($results->ISN) ? (string)$results->ISN : ''
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'result' => $e->getMessage()
            ]);
        }
    }

    public function sendNotify(Request $request){
        $users = explode(',', $request->users);
        $doc_no = $request->doc_no;
        $doc_type = $request->doc_type;
        $client = new \GuzzleHttp\Client();
        $url = 'https://botan.kupipolis.kz/notification';  //'https://bots.n9.kz/notification';
        (new NotificationController())->sendCoordinationNotify($users);
        foreach ($users as $user){
            if($this->checkNotificationSended($user, $doc_no, $doc_type)){
                continue;
            }
            $model = new Notification();
            $model->user_isn = $user;
            $model->doc_no = $doc_no;
            $model->doc_type = $doc_type;
            $model->sendDate = date('d.m.Y', time());
            $model->save();
            $res = $client->request('POST', $url, [
                'form_params' => [
                    'isn' => $user,
                    'docType' => $doc_type,
                    'docNum' => $doc_no
                ],
                'verify' => false
            ]);
            if($res->getStatusCode() !== 200){
                return false;
            }
        }
        return true;
    }

    public function closeDecade(Request $request){
        $contentT = '<div class="text-center"><img style="max-width:50%" src="/images/closed.jpg" /></div>';
        $contentT .= $request->postText;
        $isn = 1445725; //isset($request->isn) && $request->isn != null ? $request->isn : 1445722;
        $username = 'Даурен Рамазанов';    //isset($request->userName) && $request->userName != null ? $request->userName : 'Кулназаров Гани Жасаганбергенович';

        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $post = Post::where('user_isn',$isn)->whereBetween('created_at', [$from, $to])->first();

        if(!$post) {
            try {
                $new_post = new Post();
                $new_post->user_isn = $isn;  //Даурен Рамазанов
                $new_post->post_text = $contentT;
                $new_post->pinned = 0;
                $new_post->from_kias = 1;
                $new_post->save();
            } catch (\Exception $e) {
                return false;
            }

            $response = [
                'date' => date("d.m.Y H:i", strtotime($new_post->created_at)),
                'edited' => false,
                'fullname' => $username,
                'isLiked' => 0,
                'isn' => $new_post->user_isn,
                'userISN' => $new_post->user_isn,
                'likes' => 0,
                'pinned' => 0,
                'postText' => $new_post->getText(),
                'postId' => $new_post->id,
                'image' => $new_post->getImage(),
                'documents' => $new_post->getDocuments(),
                'youtube' => $new_post->getVideo(),
                'videos' => $new_post->getVideoUrl(),
                'comments' => [],
            ];

            try {
                broadcast(new NewPost([
                    'post' => $response,
                    'type' => Post::NEW_POST
                ]));
            } catch (\Exception $e) {
                return false;
            }

            return 'пост успешно добавлен';
        }
    }

    public function checkNotificationSended($isn, $no, $type){
        $data = Notification::where('user_isn', $isn)
            ->where('doc_no', $no)
            ->where('doc_type', $type)
            ->where('sendDate', date('d.m.Y', time()))
            ->get();
        return sizeof($data) > 0;
    }

    public function serviceCenterNotify(Request $request) {
        $data = $request->all();

        $users_isn = explode(',', $data['isn']);
        $client = new \GuzzleHttp\Client();
        $url = 'https://botan.kupipolis.kz/serviceCenterNotify';

        foreach ($users_isn as $isn) {
            $res = $client->request('POST', $url, [
                'form_params' => [
                    'ISN'           => $isn,
                    'serviceCenter' => $data['serviceCenter'],
                    'customer'      => $data['customer'],
                    'customerDept'  => $data['customerDept'],
                    'requestNo'     => $data['requestNo'],
                    'status'        => $data['status'],
                    'subject'       => $data['subject'],
                    'type'          => $data['type']
                ],
                'verify' => false
            ]);
            if($res->getStatusCode() !== 200){
                return response()->json([
                    'success' => false
                ]);
            }
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
