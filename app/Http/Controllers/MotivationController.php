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
        $motivations = [];
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
                $mot_sum = (number_format((double)$response->Mot->row->MotSum, 0, '.', ' '));
                $list = [
                    [
                        'types' => 'Сборы с нарастанием (>80%)',
                        'sum' => (number_format((double)$response->Mot->row->PercPlan, 0, '.', ' ') ?? 0).'%',
                        'color' => (double)$response->Mot->row->PercPlan > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Премии оплаченные (>50%)',
                        'sum' => (number_format((double)$response->Mot->row->PlanFM ?? 0)).'%',
                        'color' => ((double)$response->Mot->row->PlanFM ?? 0) > 50 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость',
                        'sum' => (number_format((double)$response->Mot->row->TotalProcKV ?? 0)).'%',
                        'color' => ((double)$response->Mot->row->TotalProcKV ?? 0) < 45 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Чистые сборы',
                        'sum' => (number_format((double)$response->Mot->row->NetFees, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации',
                        'sum' => ((double)$response->Mot->row->MotProc ?? 0).'%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Дебиторская задолженность',
                        'sum' => (number_format((double)$response->Mot->row->DZ, 0, '.', ' ')),
                        'color' => 'transparent'
                    ],
                    [
                        'types' => 'Сборы ОГПО физ.лица',
                        'sum' => (number_format((double)$response->Mot->row->SumPVTSF, 0, '.', ' ')),
                        'color' => 'transparent'
                    ],
                ];
                break;
            case 2 :
                $category = 2;
                $mot_sum = (number_format((double)$response->Mot->row->MotPrem, 0, '.', ' ') ?? 0);
                $list = [
                    [
                        'types' => 'Оплаченные премии',
                        'sum' => (number_format((double)$response->Mot->row->AmountF, 0, '.', ' ') ?? 0)."/".((double)$response->Mot->row->SharePlan ?? 0)."%",
                        'color' => (double)$response->Mot->row->SharePlan ?? 0 > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Доля ОГПО физических лиц (<20%)',
                        'sum' => (number_format((double)$response->Mot->row->DolyaVTSFis, 0, '.', ' ') ?? 0).'%',
                        'color' => ((double)$response->Mot->row->DolyaVTSFis ?? 0) < 20 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость',
                        'sum' => ((double)$response->Mot->row->Rentability ?? 0).'%',
                        'color' => ((double)$response->Mot->row->Rentability ?? 0) < 45 ? 'green' : 'red',
                    ],
                ];
                break;
            case 3 :
                $category = 3;
                $motFirst = 0;
                $motSecond = 0;
                $list = [];
                foreach ($response->Mot->row as $mot){
                    if((string)$mot->OGPO == 'Y'){
                        array_push($list, [
                            'types' => 'Сборы по ОГПО ВТС',
                            'sum' => (number_format((double)$mot->AmountF, 0, '.', ' ') ?? 0),
                            'color' => 'green',
                        ]);
                        $motFirst += ((int)$mot->TotalPrem ?? 0);
                    }else{
                        array_push($list, [
                            'types' => 'Сборы по иным классам',
                            'sum' => (number_format((double)$mot->AmountF, 0, '.', ' ') ?? 0),
                            'color' => 'green',
                        ]);
                        array_push($list, [
                            'types' => 'Кросс-продажи',
                            'sum' => (number_format((double)$mot->CrossSum, 0, '.', ' ') ?? 0),
                            'color' => 'green',
                        ]);
                        $motSecond += ((int)$mot->TotalPrem ?? 0);
                    }
                    $mot_sum = number_format($motFirst + $motSecond, 0, '.', ' ');
                }
                break;
//            case 4 :
//
//                break;
//            case 5 :
//
//                break;
            default :
                $list = [];
        }
        if(isset($mot_sum)) {
            array_push($motivations, [
                'Date' => date('m.Y', strtotime($begin)),
                'Sum' => $mot_sum,
            ]);
            if(isset($response->MOTLIST->row)) {
                foreach ($response->MOTLIST->row as $value) {
                    array_push($motivations, [
                        'Date' => date('m.Y', strtotime($value->Date)),
                        'Sum' => (int)$value->Motivation
                    ]);
                }
            }
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'list' => $list,
                'motivations' => array_reverse($motivations),
                'cat' => $category,
                'mot_sum' => $mot_sum
        ])
            ->withCallback(
                $request->input(
                    'callback'
                )
            );
    }
}
