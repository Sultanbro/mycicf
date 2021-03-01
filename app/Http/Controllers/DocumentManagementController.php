<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Helper;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Http\Controllers\SiteController;
use DB;
use mysql_xdevapi\Result;
use App\Branch;

class DocumentManagementController extends Controller
{
    /** @var KiasServiceInterface $kiasService */
    private $kiasService;

    /** @var bool */
    public $success = true;

    /** @var null */
    public $error = null;

    public function __construct(KiasServiceInterface $kias)
    {
        $this->kiasService = $kias;
    }

    public function index()
    {
        //$isn     = 1445769; //$request->isn;
        //$dateBeg = '28.09.2020'; //(new \DateTime())->format('d.m.Y');
        //$dateEnd = '01.10.2020'; //(new \DateTime())->modify('+ 7 days')->format('d.m.Y');
        //try {
        //    $getDocuments = $this->kiasService->getMySz($isn, $dateBeg, $dateEnd);
        //    dd($getDocuments);
        //    $inspections    = Helper::simpleXmlToArray($getInspections->Request);
        //} catch (\Exception $e) {
        //    return response()->json([
        //        'success' => false,
        //        'error'   => $e->getMessage(),
        //    ]);
        //}
        return view('document.management.index');
    }

    public function show(Request $request, KiasServiceInterface $kias)
    {
        //date_default_timezone_set('UTC');
        $today = date('d.m.Y');
        $documents = $kias->getMySZ(auth()->user()->ISN, '17.01.2021', $today, '2516'); //2516 - в работе
//        dd($documents);
        $itens = [];
        if(isset($documents->SZ->row)) {
            foreach ($documents->SZ->row as $iten) {
                if ($iten->classisn == $request->isn) {
                    $itens = $iten;
                }
            }
        }
        if(isset($documents->Zayav->row)){
            foreach($documents->Zayav->row as $iten) {
                if($iten->classisn == $request->isn){
                    $itens = $iten;
                }
            }
        }
        $show = $kias->request('User_CicGetDocRowAttr', [
            'CLASSISN' => $request->isn,
            'DOCISN' => '',
        ]);
//        dd($show);
        $result = [];
        $contragent = [
            'fullname' => empty((string)$show->Doc->row->SUBJNAME) ? 'Контрагент' : $show->Doc->row->SUBJNAME,
            'value' => empty((string)$show->Doc->row->SUBJNAME) ? '' : $show->Doc->row->SUBJNAME,
            'subjisn' => $show->Doc->row->SUBJISN ? '' : $show->Doc->row->SUBJISN,
        ];

        foreach($show->DocParams->row as $item) {
            array_push($result, [
                'attrisn' => (string)$item->ATTRISN,
                'remark' => (string)$item->REMARK,
                'val' => (string)$item->VAL,
                'value' => (string)$item->VALUE,
                'fullname' => (string)$item->FULLNAME,
            ]);
        }
        $resDop = [];
        $result1 = [];
        foreach($result as $res){
            if($res['fullname'] === 'Адресат' || $res['fullname'] === 'Исполнитель'){
                $result1[] = $res;
            } else {
                $resDop[] = $res;
            }
        }
        $docrows = [];
        if(isset($show->DocRow->row)){
            foreach($show->DocRow->row as $docrow){
                $docrows[] = [
                    'orderno' => empty($docrow->orderno) ? null : get_object_vars($docrow->orderno)[0],
                    'fieldname' => empty($docrow->fieldname) ? null : get_object_vars($docrow->fieldname)[0],
                    'code' => empty($docrow->code) ? null : get_object_vars($docrow->code)[0],
                    'classisn' => empty($docrow->classisn) ? null : get_object_vars($docrow->classisn)[0],
                    'rowisn' => empty($docrow->rowisn) ? null : get_object_vars($docrow->rowisn)[0],
                    'val' => empty($docrow->val) ? null : get_object_vars($docrow->val)[0],
                    'value' => empty(get_object_vars($docrow->value)) ? null : $docrow->value,
                    'value_name' => empty(get_object_vars($docrow->value_name)) ? null : $docrow->value_name,
                ];
            }
        }
//        dd($docrows);

        $className = get_object_vars($show->Doc->row->CLASSNAME)[0];
        $docdate = isset($itens->docdate) ? get_object_vars($itens->docdate) : $today;
        $docdate = isset($itens->docdate) ? date('m.d.Y',strtotime($docdate[0])) : $docdate;
        $emplisn = get_object_vars($show->Doc->row->EMPLISN)[0];
        $statusName = get_object_vars($show->Doc->row->STATUSNAME)[0];
//        dd($statusName);
        $results = array_merge([
            'classisn' => $request->isn,
            'emplisn' => $emplisn,
            'docdate' => $docdate ?? $today,
            'className' => $className,
            'statusName' => $statusName,
        ], [
            'result' => $result
        ], [
            'resDop' => $resDop
        ], [
            'result1' => $result1
        ], [
            'docrows' => $docrows
        ], [
            'contragent' => $contragent,
            ]
        );

        return view('document.management.show', compact('results'));
    }

    public function bonus(Request $request, KiasServiceInterface $kias)
    {
        $bonus = $kias->request('User_CicGetUserList', [
            'number' => 1,
        ]);
        dd($bonus);
    }

    public function listEmployee(Request $request,  KiasServiceInterface $kias)
    {
        $id = $request->id;

        return view('document.management.list', compact('id'));
    }

    public function getDocument(Request $request, KiasServiceInterface $kias)
    {
//        $dicti = [];
//        $dicti['officeNotes'] = (new SiteController())->getDictiList(800701);
//        $dicti['HRD'] = (new SiteController())->getDictiList(1760341);
//        $dicti['chancellery'] = (new SiteController())->getDictiList(1760331);
//        $dicti['statements'] = (new SiteController())->getDictiList(1007381);
//        $dicti['admDayApp'] = (new SiteController())->getDictiList(820621);
//        dd($dicti);
        $isns = ['800701', '1760341', '1760331', '1007381', '820621'];
        $result = [];
        foreach($isns as $isn) {
            $headData = Dicti::where('isn', $isn)->where('code', '0')->first();

            array_push($result, [
                'isn' => $headData['isn'],
                'fullname' => $headData['fullname'],
                'parent_isn' => $headData['parent_isn'],
                'children' => $this->getSearchChild($headData),
            ]);
//            $result = [
//                'success' => $this->success,
//                'error' => $this->error,
//                'result' => $result,
//            ];
        }
        $responseData = [
          'result' => $result,
          'success' => true,
        ];
        return response()->json($responseData);
    }

    public function getSearchChild($headData){
        $result = [];

        $data = Dicti::where('parent_isn', $headData['isn'])->get();

        foreach($data as $branchData){
                array_push($result, [
                    'isn' => $branchData['isn'],
                    'fullname' => $branchData['fullname'],
                    'parent_isn' => $headData['isn'],
                ]);
            }
        return $result;
    }

    public function documents()
    {
        $docIsn = 29403340;
        $classIsn = 800731;
        $documents = $this->kiasService->getDocument($docIsn, $classIsn);
        dd($documents);

    }

    public function getUserInfo(Request $request){
        $users = Branch::where('has_child',0)->get();
        $result = [];
        foreach($users as $user){
            $user['dept'] = isset($user->getParent->fullname) ? $user->getParent->fullname : '';
            $result[$user->kias_id] = $user;
        }
        return response()->json([
            'usersInfo' => $result
        ]);
    }

    public function saveDocument(Request $request, KiasServiceInterface $kias)
    {
        $request->result = [];
        foreach ($request->result1 as $result1){
            $request->result[] = $result1;
        }
        foreach ($request->resDop as $result2){
            $request->result[] = $result2;
        }
        if(!empty($request->result)){
            foreach($request->result as $item){
                if(isset($item['attrisn'])){
                    if(!isset($item['remark'])){
                        $item['remark'] = null;
                    }

                    if(!isset($item['val'])){
                        $item['val'] = null;
                    }

                    if(!isset($item['val'])){
                        $item['value'] = null;
                    }
                    $row[] = [
                        'ATTRISN' => $item['attrisn'],
                        'REMARK' => $item['remark'],
                        'VAL' => $item['val'], //Значение
                        'VALUE' => $item['value'], //Значение атрибута
                    ];
                }
            }
        } else {
            $row = [];
        }

        $docrows = [];
        $docs = [];
        if(isset($request->docrows)){
            foreach($request->docrows as $docrow) {
                $docrows[] = [
                    $docrow['val'] => $docrow['value'] ?? null,
                ];
            }
        }
        for($i=0; $i<count($docrows); $i++){
            $docs = array_merge($docs, $docrows[$i]);
        }
        $document = $kias->userCicSaveDocument($request->classisn, $request->emplisn, $request->docdate, $request->contragent['value'], $row, $docs);
//        dd($document);
        $docIsn = get_object_vars($document)['DocISN'];
        return response()->json([
            'request' => $request,
            'docIsn' => $docIsn,
            'success' => true,
        ]);//response.data.resultDoc

//        $show = $kias->request('userCicSaveDocument', [
//            'CLASSISN' => $itens->classisn,
//            'DOCISN' => $itens->docisn,
//            'EMPLISN' => $emplIsn,
//            'DOCDATE' => $docDate,
//            'SUBJISN' => $subjIsn,
//            'DocParams' => [
//                'row' => [
//                    'ATTRISN' => $attrIsn,
//                    'REMARK' => $remark,
//                    'VAL' => $val, //Значение
//                    'VALUE' => $value, //Значение атрибута
//                ]
//            ],
//        ]);
//        try {
//            $inspections = $this->kiasService->userCicSaveDocument($formRequest['docIsn'], $formRequest['dremark'], $data);
//            $response    = Helper::simpleXmlToArray($inspections);
//        } catch (\Exception $e) {
//            return response()->json([
//                'success' => false,
//                'error'   => $e->getMessage(),
//            ]);
//        }
    }
    public function buttonClick(Request $request, KiasServiceInterface $kias)
    {
        $error = "";
        $docIsn = $request->docIsn;
        $button = $request->button;
//        dd($request);
        if(isset($request->docIsn)){
            $buttonClick = $kias->buttonClick($docIsn, $button);
//            dd($buttonClick);
            if($buttonClick->error){
                $success = false;
                $error .= (string)$buttonClick->error->text;
                $result = [
                    'success' => $success,
                    'error' => (string)$error
                ];
                return response()->json($result)->withCallback($request->input('callback'));
            }
            if(isset($buttonClick->DOCISN)){
                $listDocIsn = get_object_vars($buttonClick->DOCISN)[0];
            } else {
                $listDocIsn = '';
            }
//            dd($listDocIsn);
            return response()->json([
                'DOCISN' => $listDocIsn,
                'success' => true,
            ]);
            if(isset($buttonClick->error)){
                $success = false;
                $error = (string)$buttonClick->error->text;
            } else {
//                foreach ($request->result['docrows'] as $info) {
//                    $refund = Refund::find($info['id']);
//                    if ($info['confirmed'] == 1) {
//                        $refund->confirmed = 1;
//                        $refund->main_doc_isn = $save->DocISN;
//                    } else {
//                        $refund->iin_fail = 1;
//                    }
//                    if ($refund->save()) {
//                        $success = true;
//                    }
//                }
            }
        } else{
            $docIsn = $request->docIsn ? '' : $request->docIsn;
            $buttonClick = $kias->buttonClick($docIsn, $button);
            return response()->json([
                'DOCISN' => '',
                'success' => true,
            ]);
        }
    }

    public function getOrSetDocs(Request $request, KiasServiceInterface $kias){
        $status1 = [
            'В работе' => '2516', 'на подписи' => '2522', 'подписан' => '2518', 'оплачен' => '2517', 'Аннулирован' => '2515',
        ];
//        dd($request);
        $docs = $kias->getOrSetDocs($request->docIsn, 1, $request->status);

//        if(isset($docs->error)){
//            $error = (string)$docs->error->text;
//        } else {
//            $docs->subjname
//        }
//        dd($docs);
        $status2 = [
            '2516' => 'В работе', '2522' => 'на подписи', 'подписан' => '2518', 'оплачен' => '2517', 'Аннулирован' => '2515',
        ];
        $status = $status2[get_object_vars($docs)['Status']];
        $stage = get_object_vars($docs)['Stage'];
//        dd($status);
        return response()->json([
            'status' => $status,
            'stage' => $stage,
            'success' => true,
        ]);
    }

    public function changeDocCoordination(Request $request, KiasServiceInterface $kias) {
        dd($request);
        $success = true;
        $error = "";
    }
}
