<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Dicti;


class PreInsuranceInspectionController extends Controller
{
    public const               STATUS_ALL        = 3;
    public const               STATUS_CONSIDERED = 0;
    public const               STATUS_INPROGRESS = 1;
    public const               CAR               = 'car';
    public const               SPECIAL_CAR       = 'specialCar';
    public const               OTHER             = 'other';
    public const               ASSIGNED          = 2518;
    public const               EXECUTE           = 1270;
    public const               CANCEL            = 1272;
    public const               DIRECTORY         = 'online_inspections';

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
        $docIsn     = !empty($request['docisn']) ? $request['docisn'] : 0;
        $isn        = $request->isn;

        return view('inspection_info', compact('isn', 'argcalcIsn', 'agrIsn', 'docIsn'));
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
        $isn     = $request->isn;
        $DateBeg = '01.05.2020';
        $DateEnd = '27.06.2020';
        try {
            $getInspections = $kias->getInsuranceInspectionList($isn, self::STATUS_ALL, $DateBeg, $DateEnd);
            $inspections    = Helper::simpleXmlToArray($getInspections->Request);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }

        if ($getInspections->error) {
            $this->success = false;
            $this->error   = (string) $getInspections->text;
        }
        $groups = [];
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
        $docIsn     = $request->docisn != 0 ? $request->docisn : '';
        try {
            //$getInspectionsInfo = $kias->getInsuranceInspectionInfo('', 1918047, 241676, 26652095);
            $getInspectionsInfo = $kias->getInsuranceInspectionInfo($agrIsn, $agrCalcIsn, $isn, $docIsn);
            $inspectionsInfo    = Helper::simpleXmlToArray($getInspectionsInfo->ROWSET);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }

        if ($getInspectionsInfo->error) {
            $this->success = false;
            $this->error   = (string) $getInspectionsInfo->text;
        }

        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => $this->getDataWithChild($inspectionsInfo),
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    /**
     * @param $inspectionsInfo
     *
     * @return array
     */
    private function getDataWithChild($inspectionsInfo)
    {
        $getDataWithDicts = [];
        $index            = 0;
        $count            = 0;
        $getUrl           = Session::get('url_for_image');
        if (!empty($inspectionsInfo['row'])) {
            foreach ($inspectionsInfo['row'] as $info) {
                $path = 'public/'.self::DIRECTORY.'/'.$info['DocID'];
                if ($info['DocStatus'] == self::ASSIGNED) {
                    $count++;
                }
                foreach ($info['details']['row'] as $key => $detail) {
                    $getDicts           = Dicti::select('id', 'isn', 'fullname')
                        ->where('parent_isn', $detail['detailisn'])
                        ->get();
                    $getDataWithDicts[] = $detail;
                    foreach ($getDicts as $dict) {
                        $getDataWithDicts[$key]['child'][] = [
                            'child_isn'  => $dict->isn,
                            'child_name' => $dict->fullname,
                        ];
                    }
                }
                $inspectionsInfo['row'][$index]['details']['row'] = $getDataWithDicts;
                if (empty($inspectionsInfo['row'][$index]['AttachLink'])) {
                    $inspectionsInfo['row'][$index]['storageLink']       = $inspectionsInfo['row'][$index]['AttachLink'];
                    if (!empty($getUrl) && in_array($info['DocID'], array_keys($getUrl))) {
                        $inspectionsInfo['row'][$index]['storageLink']       = $getUrl[$info['DocID']];
                        $inspectionsInfo['row'][$index]['AttachLink'][$path] = Storage::files($getUrl[$info['DocID']]);
                    }
                } else {
                    $inspectionsInfo['row'][$index]['storageLink']       =
                        $inspectionsInfo['row'][$index]['AttachLink'];
                    $inspectionsInfo['row'][$index]['AttachLink'][$path] =
                        Storage::files($inspectionsInfo['row'][$index]['AttachLink']);
                }
                $index++;
            }

            if ($count == count($inspectionsInfo['row'])) {
                $inspectionsInfo['isDisabled'] = 'off';

                return $inspectionsInfo;
            }
            $inspectionsInfo['isDisabled'] = 'on';

            return $inspectionsInfo;
        }

        return [];
    }

    /**
     * Отправка в КИАС
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function setInspection(Request $request, KiasServiceInterface $kias)
    {
        $data        = [];
        $formRequest = $request->all();
        foreach ($formRequest['detail'] as $value) {
            $options = !empty($value['damage']) ? explode(',', $value['damage']) : '';
            if ($value['type'] == 3) {
                $value['remark'] = $formRequest['urlStorage'];
            }
            $data['row'][] = [
                'isn'       => $value['isn'] ?? '',
                "detailisn" => $value['detailIsn'] ?? '',
                'damageisn' => !empty($value['damage']) ? $options[0] : '',
                "damage"    => !empty($value['damage']) ? $options[1] : '',
                "remark"    => !empty($value['remark']) ? $value['remark'] : '',
                "type"      => $value['type'],
            ];
        }
        try {
            $inspections = $kias->setInsuranceInspectionInfo($formRequest['docIsn'], $formRequest['dremark'], $data);
            $response    = Helper::simpleXmlToArray($inspections);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }

        $result = [
            'success' => !isset($response['error']) ? $this->success : false,
            'error'   => !isset($response['error']) ? $this->error : $response['error']['text'],
            'result'  => $inspections,
        ];

        Session::forget('url_for_image');

        return response()->json($result);
    }

    public function updateStatus(Request $request, KiasServiceInterface $kias)
    {
        $emplIsn    = Auth::user()->ISN;
        $requestAll = $request->all();
        if (!empty($requestAll)) {
            if (isset($requestAll['docIsn'])) {
                $reason = '';
                if ($requestAll['statusIsn'] == self::EXECUTE && empty($requestAll['reason'])) {
                    $reason = 'Исполнено';
                } elseif ($requestAll['statusIsn'] == self::CANCEL && empty($requestAll['reason'])) {
                    $reason = 'Отказано';
                }
                try {
                    $kias->setAppointmentOperator($emplIsn, $requestAll['docIsn'], $requestAll['statusIsn'], $reason);
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => $e->getMessage(),
                    ]);
                }
            } else {
                try {
                    $kias->setAppointmentOperator($requestAll['listOperator'], $requestAll['requestIsn'], '', '');
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => $e->getMessage(),
                    ]);
                }
            }
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
                $filePath = '/public/'.self::DIRECTORY.'/'.$request->docId.'/'.$filename;
                Storage::disk('local')->put($filePath, $contents);
            }
        }

        $urlImage  = [];
        $directory = Session::get('url_for_image');
        $path      = 'public/'.self::DIRECTORY.'/'.$request->docId;
        if (Session::has('url_for_image')) {
            $directory[$request->docId] = $path;
            Session::put('url_for_image', $directory);
        } else {
            $urlImage[$request->docId] = $path;
            Session::put('url_for_image', $urlImage);
        }

        $result = [
            'success' => $this->success,
            'message' => 'Все изображения успешно загружены',
            'result'  => $path,
        ];

        return response()->json($result);
    }

    public function getOperator(Request $request, KiasServiceInterface $kias)
    {
        $deptIsn    = $request->deptIsn;
        $requestIsn = $request->requestIsn;
        try {
            $getAvarkom = $kias->getAvarkomByDept($deptIsn);
            $avarkom    = Helper::simpleXmlToArray($getAvarkom->Avarcoms);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }

        if ($getAvarkom->error) {
            $this->success = false;
            $this->error   = (string) $getAvarkom->text;
        }

        $result = [
            'success'    => $this->success,
            'error'      => $this->error,
            'result'     => $avarkom,
            'requestIsn' => $requestIsn,
        ];

        return response()->json($result);
    }
}
