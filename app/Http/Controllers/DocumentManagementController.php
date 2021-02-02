<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Helper;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Http\Controllers\SiteController;
use DB;
use mysql_xdevapi\Result;

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
        $today = date('d.m.Y');
        $documents = $kias->getMySZ(3130947, '17.01.2021', $today, '2516');

        $itens = [];
        if(isset($documents->SZ->row)) {
            foreach ($documents->SZ->row as $iten) {
                if ($iten->classisn == '1440571') {
                    $itens = $iten;
                }
            }
        }
        if(isset($documents->Zayav->row)){
            foreach($documents->Zayav->row as $iten) {
                if($iten->classisn == '1440571'){
                    $itens = $iten;
                }
            }
        }
        $show = $kias->request('User_CicGetDocRowAttr', [
            'CLASSISN' => $itens->classisn,
            'DOCISN' => $itens->docisn,
        ]);
        $result = [];

        array_push($result, [
            'fullname' => empty((string)$show->Doc->row->SUBJNAME) ? 'Контрагент' : $show->Doc->row->SUBJNAME,
            'value' => empty((string)$show->Doc->row->SUBJNAME) ? '' : $show->Doc->row->SUBJNAME,
            'subjisn' => $show->DocParams->row->ISN,
        ]);

        foreach($show->DocParams->row as $item) {
            array_push($result, [
                'attrisn' => (string)$item->ATTRISN,
                'remark' => (string)$item->REMARK,
                'val' => (string)$item->VAL,
                'value' => (string)$item->VALUE,
                'fullname' => (string)$item->FULLNAME,
            ]);
        }
        $docrows = [];
        if(isset($show->DocRow->row)){
            foreach($show->DocRow->row as $docrow){
                array_push($docrows, [
                    'val' => $docrow->val,
                    'value' => $docrow->value,
                ]);
            }
        }
        $results = array_merge([
            'id' => $request->id,
            'classisn' => $request->isn,
            'emplisn' => $show->Doc->row->EMPLISN,
            'docdate' => $itens->docdate,
        ], [
            'result' => $result
        ], [
            'docrows' => $docrows
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

    public function saveDocument(Request $request, KiasServiceInterface $kias)
    {
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
        //dd($request->docrows);
        $docrows = [];
        if(isset($request->docrows)){
            foreach($request->docrows as $docrow) {
                $docrows[] = [
                    $docrow['val']['0'] => $docrow['value'][0] ?? null,
                ];
            }
        }
        //dd($docrows);
        //print $request->result[0]['fullname'];exit();


        $document = $kias->userCicSaveDocument($request->classisn, $request->emplisn[0], $request->docdate[0], $request->result[0]['subjisn'], $row, $docrows);
        dd($document);
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

    public function checkTest(Request $request){
        dd($request);
    }
}
