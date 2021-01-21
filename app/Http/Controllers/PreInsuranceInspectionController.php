<?php

namespace App\Http\Controllers;

use App\Helpers\Enum;
use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
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
    public const               AVARCOM           = 1;

    /**
     * @var bool
     */
    public $success = true;

    /**
     * @var null
     */
    public $error = null;

    public function index(KiasServiceInterface $kias)
    {
        $user = (new User)->getUserData($kias)['Avarcom'];
        if ($user == self::AVARCOM || Auth::user()->ISN == 3418677 || Auth::user()->dept_isn == 4774176) {
            return view('insurance_inspection');
        }
        abort(403, 'У вас нет доступа для просмотра данной страницы');
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
        $dateBeg = Date::createFromDate($request->dateBeg)->format('d.m.Y');
        $dateEnd = Date::createFromDate($request->dateEnd)->format('d.m.Y');
        try {
            $getInspections = $kias->getInsuranceInspectionList($isn, self::STATUS_ALL, $dateBeg, $dateEnd);
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
        $index  = 0;
        $count  = 0;
        $getUrl = Session::get('url_for_image');
        if (!empty($inspectionsInfo['row'])) {
            foreach ($inspectionsInfo['row'] as $info) {
                $path = 'public/'.self::DIRECTORY.'/'.$info['DocID'];
                if ($info['DocStatus'] == self::ASSIGNED) {
                    $count++;
                }
                $getDataWithDicts = [];
                foreach ($info['details']['row'] as $key => $detail) {
                    $getDicts           = Dicti::select('id', 'isn', 'fullname', 'condition_for_property')
                        ->where('parent_isn', $detail['detailisn'])
                        ->get();
                    $getDataWithDicts[] = $detail;
                    foreach ($getDicts as $dict) {
                        if ($dict->condition_for_property == Enum::NO) {
                            $getDataWithDicts[$key]['child'][] = [
                                'child_isn'  => $dict->isn,
                                'child_name' => $dict->fullname,
                            ];
                        } else {
                            $getDataWithDicts[$key]['property_child'][] = [
                                'child_isn'  => $dict->isn,
                                'child_name' => $dict->fullname,
                            ];
                        }
                    }
                }
                $inspectionsInfo['row'][$index]['details']['row'] = $getDataWithDicts;
                if (empty($inspectionsInfo['row'][$index]['AttachLink'])) {
                    $inspectionsInfo['row'][$index]['storageLink'] = $inspectionsInfo['row'][$index]['AttachLink'];
                    if (!empty($getUrl) && in_array($info['DocID'], array_keys($getUrl))) {
                        $inspectionsInfo['row'][$index]['storageLink'] = $getUrl[$info['DocID']];
                        $inspectionsInfo['row'][$index]['AttachLink']  = [
                            $path => Storage::files($getUrl[$info['DocID']]),
                        ];
                    }
                } else {
                    $inspectionsInfo['row'][$index]['storageLink'] =
                        $inspectionsInfo['row'][$index]['AttachLink'];
                    $inspectionsInfo['row'][$index]['AttachLink']  = [
                        $path => Storage::files($inspectionsInfo['row'][$index]['AttachLink']),
                    ];
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
            $remarkisn = '';
            $remark    = '';
            $damageisn = '';
            $damage    = '';
            if (!empty($value['damage'])) {
                $options   = explode(',', $value['damage']);
                $damageisn = $options[0];
                $damage    = $options[1];
            }
            if ($formRequest['typeObject'] == self::OTHER) {
                if (isset($value['working'])) {
                    if ($value['working'] == 1) {
                        $remarkisn = 1441871;
                        $remark    = 'Не рабочее';
                    } else {
                        $remarkisn = 1368331;
                        $remark    = 'Рабочее';
                    }
                } elseif (isset($value['property'])) {
                    $property  = explode(',', $value['property']);
                    $remarkisn = $property[0];
                    $remark    = $property[1];
                }
            } else {
                $remark = !empty($value['remark']) ? $value['remark'] : '';
            }
            if ($value['type'] == 3) {
                $remark     = $formRequest['urlStorage'];
                $urlStorage = explode('/', $formRequest['urlStorage']);
                $docID      = end($urlStorage);
                $damage     = env('APP_URL').'/inspection/storage?name='.$docID;
            }
            $data['row'][] = [
                'isn'       => $value['isn'] ?? '',
                "detailisn" => $value['detailIsn'] ?? '',
                'damageisn' => $damageisn,
                "damage"    => $damage,
                'remarkisn' => $remarkisn,
                "remark"    => $remark,
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
                $reason = $requestAll['reason'];
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

    public function storage(Request $request)
    {
        $lists  = [];
        $name   = $request->name;
        $isMain = true;
        if (!empty($name)) {
            $files = Storage::files('public/'.self::DIRECTORY.'/'.$name);
            foreach ($files as $file) {
                $url     = '/storage/'.substr($file, 7);
                $name    = File::basename($file);
                $lists[] = [
                    'url'  => $url,
                    'name' => $name,
                ];
                $isMain  = false;
            }
        } else {
            $directories = File::directories(public_path().'/storage/'.self::DIRECTORY.'/');
            foreach ($directories as $directory) {
                $toArray    = explode('/', $directory);
                $nameFolder = end($toArray);
                $lists[]    = $nameFolder;
            }
        }

        return view('online_inspections.storage', compact('lists', 'isMain'));
    }
}
