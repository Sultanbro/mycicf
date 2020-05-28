<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PreInsuranceInspectionController extends Controller
{
    const STATUS_ALL        = 3;
    const STATUS_CONSIDERED = 0;
    const STATUS_INPROGRESS = 1;
    const CAR               = 'car';
    const SPECIAL_CAR       = 'specialCar';
    const OTHER             = 'other';

    /**
     * @var bool
     */
    public $success = true;

    /**
     * @var null
     */
    public $error = null;

    public function index()
    {
        return view('insurance_inspection');
    }

    public function show(Request $request)
    {
        $argcalcIsn = $request['argcalcisn'];
        $agrIsn     = $request['agrisn'];
        $isn        = $request->isn;

        return view('inspection_info', compact('isn', 'argcalcIsn', 'agrIsn'));
    }

    /**
     * Получение все заявки
     *
     * @param Request              $request
     * @param KiasServiceInterface $kias
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInsuranceInspectionList(Request $request, KiasServiceInterface $kias)
    {
        $isn     = $request->isn; //4110211;
        $DateBeg = '01.05.2020';
        $DateEnd = '27.05.2020';
        try {
            $getInspections = $kias->getInsuranceInspectionList($isn, self::STATUS_ALL, $DateBeg, $DateEnd);
        } catch (\Exception $e) {
            Log::info('Ошибка при подключении к KIAS'.$e->getMessage());
        }

        if ($getInspections->error) {
            $this->success = false;
            $this->error   = (string) $getInspections->text;
        }
        $inspections = Helper::simpleXmlToArray($getInspections->Request);
        $groups      = [];
        foreach ($inspections['row'] as $inspection) {
            if ($inspection['StatusISN'] == self::STATUS_CONSIDERED
                || $inspection['StatusISN'] == self::STATUS_INPROGRESS) {
                $key = 'considered_or_inprogress';
            } else {
                $key = 'done';
            }
            $groups[$key][] = $inspection;
        }
        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => $groups,
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    /**
     * Получение предстраховой информации
     */
    public function getInsuranceInspectionInfo(Request $request, KiasServiceInterface $kias)
    {
        $isn        = $request->isn;
        $agrCalcIsn = $request->argcalcisn != 0 ? $request->argcalcisn : '';
        $agrIsn     = $request->agrisn != 0 ? $request->agrisn : '';
        try {
            $getInspectionsInfo = $kias->getInsuranceInspectionInfo('', 1842964, 238369);
        } catch (\Exception $e) {
            Log::info('Ошибка при подключении к KIAS'.$e->getMessage());
        }
        $inspectionsInfo = Helper::simpleXmlToArray($getInspectionsInfo->ROWSET);
        if ($getInspectionsInfo->error) {
            $this->success = false;
            $this->error   = (string) $getInspectionsInfo->text;
        }

        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => $inspectionsInfo,
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    /**
     * Отправка в КИАС
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function setInspection(Request $request)
    {
        $data = [
            'Details' => [
                'row' => [
                    'ISN'       => '',
                    "Damageisn" => [],
                    "Damage"    => [],
                    "Remark"    => [],
                ],
            ],
        ];
        dd($request->all());

        $inspections = [];
        $data        = Session::get('inspection');
        if (Session::has('inspection')) {
            $data[$request['typeObject']] = $request->all();
            Session::put('inspection', $data);
        } else {
            $inspections[$request['typeObject']] = $request->all();
            Session::put('inspection', $inspections);
        }

        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => !empty($inspections) ? $inspections : $data,
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function updateStatus(Request $request)
    {
        $ids = $request->all();
        dd($ids);
        foreach ($ids as $id) {

        }

        $result = [
            'success' => $this->success,
            'message' => 'Успешно обновлено',
        ];

        return response()->json($result);
    }

    /**
     * Загрузка изобржения
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, KiasServiceInterface $kias)
    {
        if (count($request->images)) {
            foreach ($request->images as $image) {
                $contents = $image->get();
                $name     = $image->getClientOriginalName();
                $filename = mt_rand(10, 9999).str_replace('-', '_', $name);
                $filePath = "online_inspections/{$filename}";
                Storage::disk('local')->put("/public/{$filePath}", $contents);
                try {
                    $results = $kias->saveAttachment(
                        $calc_isn,
                        basename($filename),
                        base64_encode($file),
                        $sendType
                    );
                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'result'  => $e->getMessage(),
                    ]);
                }
                $file = Storage::get('/public/'.$filePath);
                dd($file);
            }
        }
        $result = [
            'success' => $this->success,
            'message' => 'Все изображения успешно загружены',
        ];

        return response()->json($result);
    }
}
