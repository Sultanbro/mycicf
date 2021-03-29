<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Enum;
use App\Helpers\Helper;
use App\Library\Services\KiasServiceInterface;
use App\Library\Services\PostsService;
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
                    $dicti->type     = 'online_inspection';
                    $dicti->code     = '';
                    $dicti->numcode  = '';
                    $dicti->n_kids   = !empty($detail['dicti']) ? 1 : 0;
                    $dicti->save();
                } else {
                    $data->isn      = $detail['detailisn'];
                    $data->fullname = $detail['detail'];
                    $data->type     = 'online_inspection';
                    $data->code     = '';
                    $data->numcode  = '';
                    $data->n_kids   = !empty($detail['dicti']) ? 1 : 0;
                    $data->save();
                }
                if (!empty($detail['dicti'])) {
                    $this->getDataWithDicti($kiasService, $detail, $detail['dicti'], Enum::NO);
                }

                if (!empty($detail['dicti2'])) {
                    $this->getDataWithDicti($kiasService, $detail, $detail['dicti2'], Enum::YES);
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

    /**
     * @param KiasServiceInterface $kiasService
     * @param                      $detail
     * @param                      $detail_dicti
     *
     * @throws \Exception
     */
    private function getDataWithDicti(KiasServiceInterface $kiasService, $detail, $detail_dicti, $enum)
    {
        $getDicts = $kiasService->getDictList($detail_dicti, 0);
        $dicts    = Helper::simpleXmlToArray($getDicts->ROWSET);
        foreach ($dicts['row'] as $dict) {
            $getData = Dicti::where('isn', $dict['ISN'])->where('parent_isn', $detail['detailisn'])->first();
            if (empty($getData)) {
                $model                         = new Dicti();
                $model->isn                    = $dict['ISN'];
                $model->fullname               = $dict['FULLNAME'];
                $model->parent_isn             = $detail['detailisn'];
                $model->parent_name            = $dict['FULLNAME'];
                $model->condition_for_property = $enum;
                $model->type                   = 'online_inspection';
                $model->code                   = '';
                $model->numcode                = '';
                $model->save();
            } else {
                $getData->isn                    = $dict['ISN'];
                $getData->fullname               = $dict['FULLNAME'];
                $getData->parent_isn             = $detail['detailisn'];
                $getData->parent_name            = $dict['FULLNAME'];
                $getData->condition_for_property = $enum;
                $getData->type                   = 'online_inspection';
                $getData->code                   = '';
                $getData->numcode                = '';
                $getData->save();
            }
        }
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

    public function removeDicti(Request $request)
    {
        $isn       = $request->isn;
        $parentIsn = $request->parentIsn;
        $enum      = $request->enum;
        if (empty($isn) || empty($parentIsn) || empty($enum)) {
            //dd('Не хватает параметры');
        }
        Dicti::where('isn', $isn)->where('parent_isn', $parentIsn)->where('condition_for_property', $enum)->delete();
        dd('OKk');
    }

    public function action1(PostsService $service) {
        return $service->getPosts('');
    }

    public function react() {
        return view('testing.sandbox.react');
    }

    public function react2() {
        return view('testing.sandbox.react2');
    }
}
