<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class MotivationController extends Controller
{
    public function motivation(){
        return view('motivation');
    }

    /*
     * Category   - 1
     * PercPlan   - Сборы с нарастанием (>80%)
     * PlanFM     - Премии оплаченные (>50%)
     * TotalProcK - VСебестоимость
     * MotProc    - % мотивации
     * SumPVTSF   - Сборы ОГПО физ.лица
     * (SumFJury - SumProcFJurY + SumFJurN)  - Чистые сборы
     * EmplAgrDZ31 - Дебиторская задолженность
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     */

    public function getMotivationList(Request $request, KiasServiceInterface $kias){
        $success = true;
        $error = '';
        $ISN = $request->isn;
        $begin = $request->begin;
        $motivations = [];
        $mot_sum = '';
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
        $category = 0;
        switch ((int)$response->Category) {
            case 1 :
                $category = 1;
                $mot_sum = (number_format((double)$response->Mot->row->MotSum, 0, '.', ' '));
                $list = [
                    [
                        'types' => 'Сборы с нарастанием (>80%)',
                        'sum' => ($response->Mot->row->PercPlan).'%',
                        'PlanF' => (number_format((double)$response->Mot->row->PlanF, 0, '.', ' ')),
                        'color' => (double)$response->Mot->row->PercPlan > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Премии оплаченные (>50%)',
                        'sum' => ($response->Mot->row->PlanFM).'%',
                        'SumP' => (number_format((double)$response->Mot->row->SumP, 0, '.', ' ')),
                        'color' => ((double)$response->Mot->row->PlanFM ?? 0) > 50 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость*',
                        'sum' => ($response->Mot->row->TotalProcKV).'%',
                        'color' => ((double)$response->Mot->row->TotalProcKV ?? 0) < 45 ? 'green' : 'red',
                        'tooltip'    => 'Средневзвешенный размер комиссии и дополнительных расходов от брутто поступивших страховых премий, в %',
                    ],
                    [
                        'types' => 'Чистые сборы',
                        'sum' => (number_format(
                            (double)$response->Mot->row->SumFJurY
                            - (double)$response->Mot->row->SumProcFJurY
                            + (double)$response->Mot->row->SumFJurN )),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации',
                        'sum' => ($response->Mot->row->MotProc ?? 0).'%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Дебиторская задолженность',
                        'sum' => (number_format((double)$response->Mot->row->EmplAgrDZ31, 0, '.', ' ')),
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
//                $category = 3;
//                $motFirst = 0;
//                $motSecond = 0;
//                $list = [];
//                foreach ($response->Mot->row as $mot){
//                    array_push($list, [
//                        'types' => 'Сборы по ОГПО ВТС',
//                        'sum' => (number_format((double)$mot->AmountF, 0, '.', ' ') ?? 0),
//                        'color' => 'green',
//                    ]);
//                    $motFirst += ((int)$mot->TotalPrem ?? 0);
//                }
//                break;
//                break;
            case 5 :

                break;
            default :
                $list = [];
        }
        $x_axis = array();
        $y_axis = array();
        if(isset($mot_sum)) {
            $finded = false;
            if(isset($response->MOTLIST->row)) {
                foreach ($response->MOTLIST->row as $value) {
                    if(date('m.Y', strtotime($value->Date)) == date('m.Y', strtotime($begin))) $finded = true;
                    array_push($motivations, [
                        'Date' => date('m.Y', strtotime($value->Date)),
                        'Sum' => (int)$value->Motivation
                    ]);
                    array_push($x_axis, date('m.Y', strtotime($value->Date)));
                    array_push($y_axis, (int)$value->Motivation);
                }
            }
            if(!$finded){
                array_push($motivations, [
                    'Date' => date('m.Y', strtotime($begin)),
                    'Sum' => str_replace(' ', '', $mot_sum),
                ]);
            }
        }
        $chart_data = array(
            'x_axis' => array_reverse($x_axis),
            'y_axis' => array_reverse($y_axis),
        );

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'list' => $list,
                'motivations' => array_reverse($motivations),
                'cat' => $category,
                'mot_sum' => $mot_sum,
                'chart_data' => $chart_data,
            ])
            ->withCallback(
                $request->input(
                    'callback'
                )
            );
    }
}
