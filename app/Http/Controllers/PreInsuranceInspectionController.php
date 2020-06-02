<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Dicti;


class PreInsuranceInspectionController extends Controller
{
    const STATUS_ALL        = 3;
    const STATUS_CONSIDERED = 0;
    const STATUS_INPROGRESS = 1;
    const CAR               = 'car';
    const SPECIAL_CAR       = 'specialCar';
    const OTHER             = 'other';
    const ASSIGNED          = 2518;

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
        try {
            $getInspectionsInfo = $kias->getInsuranceInspectionInfo('', 1921023, 239551);
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

    private function getDataWithChild($inspectionsInfo)
    {
        $getDataWithDicts = [];
        $index            = 0;
        $count            = 0;
        foreach ($inspectionsInfo['row'] as $info) {
            if ($info['DocStatus'] == self::ASSIGNED) {
                $count++;
            }
            foreach ($info['details']['row'] as $key => $detail) {
                $getDicts           = Dicti::select('id', 'isn', 'fullname')
                    ->where('parent_isn', $detail['Detailisn'])
                    ->get();
                $getDataWithDicts[] = $detail;
                foreach ($getDicts as $dict) {
                    $getDataWithDicts[$key]['child'][] = [
                        'child_isn'  => $dict->isn,
                        'child_name' => $dict->fullname,
                    ];
                }
            }
            $inspectionsInfo['row'][$index++]['details']['row'] = $getDataWithDicts;
        }

        if ($count == count($inspectionsInfo['row'])) {
            $inspectionsInfo['row']['disabled'] = 'ON';
        }

        return $inspectionsInfo;
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
        //dd($formRequest);
        foreach ($formRequest['detail'] as $value) {
            $options       = explode(',', $value['damage']);
            $data['row'][] = [
                'ISN'       => $value['isn'],
                "Detailisn" => $value['detailIsn'],
                'Damageisn' => !empty($value['damage']) ? $options[0] : '',
                "Damage"    => !empty($value['damage']) ? $options[1] : '',
                "Remark"    => '',
            ];
        }
        //dd($data);
        try {
            $inspections = $kias->setInsuranceInspectionInfo($formRequest['docIsn'], $data);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ]);
        }

        $result = [
            'success' => $this->success,
            'error'   => $this->error,
            'result'  => !empty($inspections) ? $inspections : $data,
        ];

        return response()->json($result)->withCallback($request->input('callback'));

        $inspections = [];
        $data        = Session::get('inspection');
        if (Session::has('inspection')) {
            $data[$request['typeObject']] = $request->all();
            Session::put('inspection', $data);
        } else {
            $inspections[$request['typeObject']] = $request->all();
            Session::put('inspection', $inspections);
        }
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
                $file = Storage::get('/public/online_inspections/'.$filename);
                try {
                    $kias->saveAttachment(
                        $request->refIsn,
                        basename($filename),
                        base64_encode($file),
                        'D'
                    );
                } catch (Exception $e) {
                    return response()->json([
                        'success' => false,
                        'result'  => $e->getMessage(),
                    ]);
                }
            }
        }
        $result = [
            'success' => $this->success,
            'message' => 'Все изображения успешно загружены',
        ];

        return response()->json($result);
    }

    public function sendDocs(Request $request, KiasServiceInterface $kias)
    {
        if (count($request->file('files')) > 0) {
            $product   = ExpressProduct::find($request->id);
            $uploaded  = [];
            $quotation = FullQuotation::where('calc_isn', $request->calc_isn)->first();
            $sendType  = $quotation->calc_da == 1 ? 'Q' : 'C';
            foreach ($request->file('files') as $file) {
                $contents  = $file->get();
                $extension = $file->extension();
                $filename  = str_replace(' ', '_', $product->name).mt_rand(1000000, 9999999).'.'.$extension;
                $filePath  = "products/{$filename}";
                if (Storage::disk('local')->put("/public/{$filePath}", $contents)) {
                    array_push($uploaded, [
                        'file'         => '/public/products/'.$filename,
                        'originalName' => $file->getClientOriginalName(),
                    ]);
                }

                $calc_isn = str_replace('-', '', $request->calc_isn);
                $file     = Storage::get('/public/products/'.$filename);
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
            }
            $quotation->docs = json_encode($uploaded);
            $quotation->save();
        }

        return response()->json([
            'success' => true,
            'error'   => '',
        ]);
    }
}
