<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function index(Request $request, KiasServiceInterface $kiasService)
    {
        $isn        = $request['isn'];
        $doscisn    = $request['doscisn'] != 0 ? $request['doscisn'] : '';
        $agrcalcisn = $request['argcalcisn'] != 0 ? $request['argcalcisn'] : '';
        $agrisn     = $request['agrisn'] != 0 ? $request['agrisn'] : '';
        try {
            $getInspectionsInfo = $kiasService->getInsuranceInspectionInfo($agrisn, $agrcalcisn, $isn, $doscisn);
            $inspectionsInfo    = Helper::simpleXmlToArray($getInspectionsInfo->ROWSET);
        } catch (\Exception $e) {
            $result = [
                'success' => false,
                'error'   => $e->getMessage(),
            ];

            return response()->json($result);
        }

        if ($getInspectionsInfo->error) {
            $this->success = false;
            $this->error   = (string) $getInspectionsInfo->text;
        }
        foreach ($inspectionsInfo['row'] as $inspection) {
            foreach ($inspection['details']['row'] as $detail) {
                $data = Dicti::where('isn', $detail['detailisn'])->first();
                if (empty($data)) {
                    $dicti           = new Dicti();
                    $dicti->isn      = $detail['detailisn'];
                    $dicti->fullname = $detail['detail'];
                    $dicti->code     = '';
                    $dicti->numcode  = '';
                    $dicti->n_kids   = !empty($detail['dicti']) ? 1 : 0;
                    $dicti->save();
                } else {
                    $data->isn      = $detail['detailisn'];
                    $data->fullname = $detail['detail'];
                    $data->code     = '';
                    $data->numcode  = '';
                    $data->n_kids   = !empty($detail['dicti']) ? 1 : 0;
                    $data->save();
                }
                if (!empty($detail['dicti'])) {
                    $getDicts = $kiasService->getDictList($detail['dicti'], 0);
                    $dicts    = Helper::simpleXmlToArray($getDicts->ROWSET);
                    foreach ($dicts['row'] as $dict) {
                        $getData = Dicti::where('isn', $dict['ISN'])->first();
                        if (empty($getData)) {
                            $model              = new Dicti();
                            $model->isn         = $dict['ISN'];
                            $model->fullname    = $dict['FULLNAME'];
                            $model->parent_isn  = $detail['detailisn'];
                            $model->parent_name = $dict['FULLNAME'];
                            $model->code        = '';
                            $model->numcode     = '';
                            $model->save();
                        } else {
                            $getData->isn         = $dict['ISN'];
                            $getData->fullname    = $dict['FULLNAME'];
                            $getData->parent_isn  = $detail['detailisn'];
                            $getData->parent_name = $dict['FULLNAME'];
                            $getData->code        = '';
                            $getData->numcode     = '';
                            $getData->save();
                        }
                    }
                }
            }
        }
        dd('OK');
    }


    public function avarkom(KiasServiceInterface $kias)
    {
        $avarkom  = $kias->getAvarkomByDept(1000);
        $getArray = Helper::simpleXmlToArray($avarkom);
        dd($getArray);
    }


    private function test($inspectionsInfo)
    {
        $getDataWithDicts = [];
        foreach ($inspectionsInfo['row'][0]['Details']['row'] as $key => $detail) {
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
        $inspectionsInfo['row'][0]['Details']['row'] = $getDataWithDicts;

        return $inspectionsInfo;
    }
}
