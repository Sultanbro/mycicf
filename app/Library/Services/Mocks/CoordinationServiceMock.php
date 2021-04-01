<?php


namespace App\Library\Services\Mocks;


use App\Events\NewPost;
use App\Http\Controllers\NotificationController;
use App\Library\Services\CoordinationServiceInterface;
use App\Library\Services\KiasServiceInterface;
use App\Library\Services\NotificationServiceInterface;
use App\Post;
use App\Notification;
use App\Library\Services\Kias;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;
use SimpleXMLElement;

/**+
 * Class CoordinationService
 *
 * Сервис для работы с листами согласования
 *
 * @package App\Library\Services
 */

class CoordinationServiceMock implements CoordinationServiceInterface
{
    private static $instance;
    /**
     * @var KiasServiceInterface|\Illuminate\Contracts\Foundation\Application
     */
    private $kias;

    public static function instance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->kias = app(KiasServiceInterface::class);
    }

    const AC_ATTRIBUTES_LABEL = 'ACattr';
    const COORDINATIONS_LABEL = 'Coordination';

    public function CoordinationList($ISN){
        return new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
            <data>
                <AC>
                    <row>
                        <ISN>5565</ISN>
                        <type>1</type>
                        <curator>1</curator>
                        <DeptName>1</DeptName>
                        <id>1</id>
                        <docdate>01.01.2021</docdate>
                        <ClassPovestka>1</ClassPovestka>
                        <Povestka>1</Povestka>
                    </row>
                </AC>
                <SP>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </SP>
                <SZ>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <SzISN></SzISN>
                        <SzClassISN></SzClassISN>
                    </row>
                </SZ>
                <KV>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </KV>
                <OL>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <DeptName></DeptName>
                    </row>
                </OL>
                <AD>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <id>1</id>
                        <period>1</period>
                        <docdate>01.01.2021</docdate>
                        <days></days>
                    </row>
                </AD>
                <RV>
                    <row>
                        <ISN>5565</ISN>
                        <empl></empl>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docpaydate>01.01.2021</docpaydate>
                    </row>
                </RV>
                <BK>
                    <row>
                        <ISN>5565</ISN>
                        <type></type>
                        <curator></curator>
                        <DeptName></DeptName>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                    </row>
                </BK>
                <other>
                    <row>
                        <ISN>5565</ISN>
                        <Type></Type>
                        <curator></curator>
                        <id></id>
                        <docdate>01.01.2021</docdate>
                        <DeptName></DeptName>
                        <ClassISN></ClassISN>
                        <RefDocISN></RefDocISN>
                        <RefClassISN></RefClassISN>
                    </row>
                </other>
            </data>
        ');
    }

    public function CoordinationInfo($docIsn)
    {
        $success = true;
        $error = "";
        //$docIsn = $request->docIsn;
        $response = $this->kias->getCoordination($docIsn);
        if($response->error){
            $success = false;
            $error .= (string)$response->error->text;
            $result = [
                'success' => $success,
                'error' => (string)$error
            ];

            return $result;
        }
        $responseData = [];
        $attributes = [];
        $coordinations = [];
        foreach ((array)$response as $key => $value){
            if($value != "0"){
                if(in_array((string)$key, array_keys(self::attributeKeys())))
                {
                    array_push($attributes, [
                        'Name' => self::attributeKeys()[$key],
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
                elseif(in_array($key,self::getCoordinationAttributes()))
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
                                if (in_array($attrKey, array_keys(self::getKVAttributes())) && (string)$attrValue !== "0") {
                                    array_push($attributes, [
                                        'Name' => (string)self::getKVAttributes()[$attrKey],
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
        return $result;
    }

    public function CoordinationService($DocISN, $ISN, $Solution,$Remark, $Resolution){
        $success = true;
        $error = '';
        $kias = new Kias();
        $kias->initSystem();
        $response = $kias->setCoordination($DocISN, $ISN, $Solution,$Remark, $Resolution);
        if($response->error){
            $success = false;
            $error .= $response->error->fulltext;
            $result = [
                'success' => $success,
                'error' => $error,
            ];

            return $result;
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'result' => (string)$response->Result
        ];
        return $result;
    }

    public function DocRowList($class_isn, $doc_isn) {

        $result = $this->kias->request('User_CicGetDocRowAttr', [
            'CLASSISN' => $class_isn->class_isn,
            'DOCISN' => $doc_isn->doc_isn,
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

            return  $result = [
                'success' => true,
                'doc_row_list' => $doc_row_list,
                'doc_row_inner' => $doc_row_inner,
            ];
        }
        return  $result;
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

    public function AttachmentsService ($docIsn){
        $response = $this->kias->getAttachmentsList($docIsn);
        $attachments = [];
        if($response->error){
            $result = [
                'success' => false,
                'error' => (string)$response->error->text,
            ];
            return $result;
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
        return $result;
    }

    public function AgreedCoordination($ISN){

        $results = $this->kias->request('User_CicGetAgreedCoordinationList', array(
            'EmplISN' => $ISN
        ));

        if(!isset($results->error)) {
            $agreedAC = [];
            foreach ($results->AgreedAC->row as $result){
                array_push($agreedAC, [
                    'ISN'=> (string)$result->ISN,
                    'type'=>(string)$result->type,
                    'curator'=>(string)$result->curator,
                    'DeptName'=>(string)$result->DeptName,
                    'id'=>(string)$result->id,
                    'docdate'=>(string)$result->docdate,
                    'ClassPovestka'=>(string)$result->ClassPovestka,
                    'Povestka'=>(string)$result->Povestka
                ]);
            }

            return $response = [
                'agreedAC' => $agreedAC,
                'success' => true
            ];
        }
        else {
            return $response = [
                'success' => false
            ];
        }
    }


    public function saveAttachmentService($fileType, $isn, $requestType){
        try{
            $success = true;
            if($fileType == 'base64'){
                $file = $fileType->file;
                $extension = isset($fileType->fileExt) ? $fileType->fileExt : '';
                $filename = 'signed_'.$fileType->id.'_'.Auth::user()->full_name.'.'.$extension;  //.mt_rand(1000000, 9999999);
            } /*else {
//                $file = $request->base64_encode($request->file);
//                $contents = $file->get();
//                $extension = $file->extension();
//                $filename = mt_rand(1000000, 9999999).'.'.$extension;
            }*/

            $results = $this->kias->saveAttachment(
                $isn,
                $filename,
                $file,
                $requestType
            );
            if(isset($results->error)){
                $success = false;
                $error = 'Ошибка загрузки файла, обратитесь к системному администратору';  //(string)$results->error->text
            }

            return $response = [
                'success' => $success,
                'error' => isset($error) ? $error : '',
                'result' => isset($results->ISN) ? (string)$results->ISN : ''
            ];
        } catch (Exception $e) {
            return $response = [
                'success' => false,
                'result' => $e->getMessage()
            ];
        }
    }

    public function sendNotifyService($users_rec, $doc_no, $doc_type){
        $users = explode(',', $users_rec);
        $client = new Client();
        $url = 'https://botan.kupipolis.kz/notification';  //'https://bots.n9.kz/notification';
        (new NotificationController(app(NotificationServiceInterface::class)))->sendCoordinationNotify($users);
        foreach ($users as $user){
            if(self::checkNotificationSended($user, $doc_no, $doc_type)){
                continue;
            }
            $model = new Notification();
            $model->user_isn = $user;
            $model->doc_no = $doc_no;
            $model->doc_type = $doc_type;
            $model->sendDate = date('d.m.Y', time());
            $model->save();
            try {
                $res = $client->request('POST', $url, [
                    'form_params' => [
                        'isn' => $user,
                        'docType' => $doc_type,
                        'docNum' => $doc_no
                    ],
                    'verify' => false
                ]);
            } catch (GuzzleException $e) {
            }
            if($res->getStatusCode() !== 200){
                return false;
            }
        }
        return true;
    }

    public function closeDecadeService($postText){
        $contentT = '<div class="text-center"><img style="max-width:50%" src="/images/closed.jpg" /></div>';
        $contentT .= $postText;
        $isn = 1445725; //isset($request->isn) && $request->isn != null ? $request->isn : 1445722;
        $username = 'Даурен Рамазанов';    //isset($request->userName) && $request->userName != null ? $request->userName : 'Кулназаров Гани Жасаганбергенович';

        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $post = Post::where('user_isn',$isn)->whereBetween('created_at', [$from, $to])->first();

        if(!$post) {
            $new_post = new Post();
            $new_post->user_isn = $isn;  //Даурен Рамазанов
            $new_post->post_text = $contentT;
            $new_post->pinned = 0;
            $new_post->from_kias = 1;
            $new_post->save();

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

            broadcast(new NewPost([
                'post' => $response,
                'type' => Post::NEW_POST
            ]));
        }
        return 'пост успешно добавлен';
    }

    public function checkNotificationSended($isn, $no, $type){
        $data = Notification::where('user_isn', $isn)
            ->where('doc_no', $no)
            ->where('doc_type', $type)
            ->where('sendDate', date('d.m.Y', time()))
            ->get();
        return sizeof($data) > 0;
    }

    public function serviceCenterNotify($data) {
        $param = $data->isn;
        $users_isn = explode(',', $param['isn']);
        $client = new Client();
        $url = 'https://botan.kupipolis.kz/serviceCenterNotify';

        foreach ($users_isn as $isn) {
            try {
                $result = $client->request('POST', $url, [
                    'form_params' => [
                        'ISN' => $isn,
                        'serviceCenter' => $data['serviceCenter'],
                        'customer' => $data['customer'],
                        'customerDept' => $data['customerDept'],
                        'requestNo' => $data['requestNo'],
                        'status' => $data['status'],
                        'subject' => $data['subject'],
                        'type' => $data['type']
                    ],
                    'verify' => false
                ]);
            } catch (GuzzleException $e) {
            }
            if($result->getStatusCode() !== 200){
                return $result = [
                    'success' => false
                ];
            }
        }
        return $result =[
            'success' => true,
        ];
    }
}
