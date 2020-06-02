<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function index(KiasServiceInterface $kiasService)
    {
        try {
            $getInspectionsInfo = $kiasService->getInsuranceInspectionInfo('', 1921509, 238704);
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
        dd($inspectionsInfo);
        foreach ($inspectionsInfo['row'] as $inspection) {
            foreach ($inspection['Details']['row'] as $detail) {
                $data = Dicti::where('isn', $detail['Detailisn'])->first();
                if (empty($data)) {
                    $dicti           = new Dicti();
                    $dicti->isn      = $detail['Detailisn'];
                    $dicti->fullname = $detail['Detail'];
                    $dicti->code     = '';
                    $dicti->numcode  = '';
                    $dicti->n_kids   = !empty($detail['Dicti']) ? 1 : 0;
                    $dicti->save();
                }
                if (!empty($detail['Dicti'])) {
                    $getDicts = $kiasService->getDictList($detail['Dicti'], 0);
                    $dicts    = Helper::simpleXmlToArray($getDicts->ROWSET);
                    foreach ($dicts['row'] as $dict) {
                        $getData = Dicti::where('isn', $dict['ISN'])->first();
                        if (empty($getData)) {
                            $model              = new Dicti();
                            $model->isn         = $dict['ISN'];
                            $model->fullname    = $dict['FULLNAME'];
                            $model->parent_isn  = $detail['Detailisn'];
                            $model->parent_name = $dict['FULLNAME'];
                            $model->code        = '';
                            $model->numcode     = '';
                            $model->save();
                        }
                    }
                }
            }
        }
        dd('OK');
    }

    private function test($inspectionsInfo)
    {
        $getDataWithDicts = [];
        foreach ($inspectionsInfo['row'][0]['Details']['row'] as $key=>$detail) {
            $getDicts = Dicti::select('id', 'isn', 'fullname')
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
