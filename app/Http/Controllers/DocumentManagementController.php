<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
        $isn     = 1445769; //$request->isn;
        $dateBeg = '28.09.2020'; //(new \DateTime())->format('d.m.Y');
        $dateEnd = '01.10.2020'; //(new \DateTime())->modify('+ 7 days')->format('d.m.Y');
        try {
            $getDocuments = $this->kiasService->getMySz($isn, $dateBeg, $dateEnd);
            dd($getDocuments);
            $inspections    = Helper::simpleXmlToArray($getInspections->Request);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }
        return view('document.management.index');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        return view('document.management.show', compact('id'));
    }

    public function listEmployee(Request $request)
    {
        $id = $request->id;
        return view('document.management.list', compact('id'));
    }

    public function getDocument(Request $request)
    {
        //$isn     = 1445769; //$request->isn;
        //$dateBeg = (new \DateTime())->format('d.m.Y');
        //$dateEnd = (new \DateTime())->modify('+ 7 days')->format('d.m.Y');
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

        $documents = [
            'Служебные записи' => [
                1 => 'СЗ на обучение',
                2 => 'СЗ. Закуп орг.техника',
                3 => 'СЗ. Командировка',
            ],
            'Заявления' => [
                4 => 'Заявление не административный день',
                5 => 'Лист согласования',
            ],
        ];

        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => $documents,
        ];

        return response()->json($result);
    }

    public function documents()
    {
        $docIsn = 29403340;
        $classIsn = 800731;
        $documents = $this->kiasService->getDocument($docIsn, $classIsn);
        dd($documents);

    }

    public function saveDocument(Request $request)
    {
        dd($request->all());
        try {
            $inspections = $this->kiasService->saveDocument($formRequest['docIsn'], $formRequest['dremark'], $data);
            $response    = Helper::simpleXmlToArray($inspections);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }
    }
}
