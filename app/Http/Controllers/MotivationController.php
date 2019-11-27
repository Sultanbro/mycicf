<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class MotivationController extends Controller
{
    public function motivation(){
        return view('motivation');
    }

    public function getMotivationList(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = '';
        $ISN = $request->isn;
        $begin = $request->begin;
        $response = $kias->getEmplMotivation($ISN, $begin);
        if($response->error) {
            return response()
                ->json([
                    'success' => false,
                    'error' => (string)$response->error->text
                ])
                ->withCallback(
                    $request->input(
                        'callback'
                    )
                );
        }
        switch ((int)$response->Category) {
            case 1 :
                $category = 1;
                $mot_sum = ((double)$response->Mot->row->MotSum);
                $list = [
                    [
                        'types' => 'Сборы с нарастанием (>80%)',
                        'sum' => ((double)$response->Mot->row->PercPlan ?? 0).'%',
                        'color' => (double)$response->Mot->row->PercPlan > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Премии оплаченные (>50%)',
                        'sum' => ((double)$response->Mot->row->SumP ?? 0).'%',
                        'color' => ((double)$response->Mot->row->SumP ?? 0) > 50 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость',
                        'sum' => ((double)$response->Mot->row->TotalProcKV ?? 0).'%',
                        'color' => ((double)$response->Mot->row->TotalProcKV ?? 0) < 45 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Чистые сборы',
                        'sum' => ((double)$response->Mot->row->NetFees ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации',
                        'sum' => ((double)$response->Mot->row->MotProc ?? 0).'%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Дебиторская задолженность',
                        'sum' => ((double)$response->Mot->row->DZ),
                        'color' => 'transparent'
                    ],
                    [
                        'types' => 'Сборы ОГПО физ.лица',
                        'sum' => ((double)$response->Mot->row->SumPVTSF),
                        'color' => 'transparent'
                    ],
                ];
                break;
//            case 2 :
//                $category = 2;
//                $list = [
//                    [
//                        'types' => 'Оплаченные премии',
//                        'sum' => (double)$response->Mot->row->AmountF ?? 0,
//                        'color' => (double)$response->Mot->row->SharePlan > 80 ? 'green' : 'red',
//                    ],
//                    [
//                        'types' => 'Доля ОГПО физических лиц (<20%)',
//                        'sum' => ((double)$response->Mot->row->DolyaVTSFis ?? 0).'%',
//                        'color' => ((double)$response->Mot->row->DolyaVTSFis ?? 0) < 20 ? 'green' : 'red',
//                    ],
//                    [
//                        'types' => 'Себестоимость',
//                        'sum' => ((double)$response->Mot->row->SharePlan ?? 00).'%',
//                        'color' => ((double)$response->Mot->row->SharePlan ?? 0) < 45 ? 'green' : 'red',
//                    ],
//                ];
//                break;
//            case 3 :
//
//                break;
//            case 4 :
//
//                break;
//            case 5 :
//
//                break;
            default :
                $list = [];
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'list' => $list,
                'cat' => 1,
//                'cat' => $category,
                'mot_sum' => ((double)$response->Mot->row->MotSum)
//                'mut_sum' => $mot_sum
            ])
            ->withCallback(
                $request->input(
                    'callback'
                )
            );
    }
}
