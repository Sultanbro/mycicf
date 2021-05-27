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
     * Category   - 1 (головной)
     * PercPlan   - Сборы с нарастанием (>80%)
     * PlanFM     - Премии оплаченные (>50%)
     * TotalProcK - Себестоимость
     * MotProc    - % мотивации
     * SumPVTSF     - Сборы ОГПО физ.лица
     * (SumFJury - SumProcFJurY + SumFJurN)  - Чистые сборы
     * EmplAgrDZ31 - Дебиторская задолженность
     *
     * Category - 1 (филиал)
     * AmountF           - Премии оплаченные
     * PlanP             - План
     * Vypolnenie        - Выполнение
     * Sebestoimost      - Себестоимость
     * EmplAgrDZ31Proc   - Дебиторская задолженность
     * MotProc           - % мотивации
     *
     * Category - 2 (филиал)
     * AmountF           - Премии оплаченные
     * PlanP             - План
     * SharePlan        - Выполнение*
     * Rentability       - Себестоимость
     * DolyaVTSFis       - Доля ОГПО физических лиц (<20%)
     * MotProc           - % мотивации
     *
     * Category - 3 (головной)
     * AmountF           - Премии оплаченные
     * TypePrem -       ОГПО
     * Mot12
     * TotalPrem -
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
                        'sum' => ($response->Mot->row->PercPlan).'%'.' '."/".' '.(number_format((double)$response->Mot->row->PlanF, 0, '.', ' ')),
                        'color' => (double)$response->Mot->row->PercPlan > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Премии оплаченные (>50%)',
                        'sum' => ($response->Mot->row->PlanFM).'%'.' '."/".' '.(number_format((double)$response->Mot->row->SumP, 0, '.', ' ')),
                        'color' => ((double)$response->Mot->row->PlanFM ?? 0) > 50 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость*',
                        'sum' => ($response->Mot->row->TotalProcKV).'%',
                        'color' => ((double)$response->Mot->row->TotalProcKV ?? 0) < 45 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Чистые сборы для расчета мотивации',
                        'sum' => (number_format(
                            (double)$response->Mot->row->SumFJurY
                            - (double)$response->Mot->row->SumProcFJurY
                            + (double)$response->Mot->row->SumFJurN )),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации*',
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
                //1 категория филиал
                foreach ($list as $item => $elem){
                    if($elem['sum'] === '% / 0'){
                        $category = 1.1;
                        $list = [
                            [
                                'types' => 'Премии оплаченные / (План)',
                                'sum' => (number_format((double)$response->Mot->row->AmountF, 0, '.', ' ')).' '.'/'.' '.(number_format((double)$response->Mot->row->PlanP, 0, '.', ' ')),
                                'color' => ((double)$response->Mot->row->AmountF ?? 0) > 100 ? 'green' : 'red',
                            ],
                            [
                                'types' => 'Выполнение (>100%)',
                                'sum' => (number_format((double)$response->Mot->row->Vypolnenie, 0, '.', ' ')).'%',
                                'color' => ((double)$response->Mot->row->Vypolnenie ?? 0) > 100 ? 'green' : 'red',
                            ],
                            [
                                'types' => 'Себестоимость*',
                                'sum' => ($response->Mot->row->Sebestoimost).'%',
                                'color' => 'transparent',
                            ],
                            [
                                'types' => 'Дебиторская задолженность',
                                'sum' => (number_format((double)$response->Mot->row->EmplAgrDZ31Proc, 0, '.', ' ')),
                                'color' => 'transparent'
                            ],
                            [
                                'types' => '% мотивации',
                                'sum' => ($response->Mot->row->MotProc ?? 0).'%',
                                'color' => 'transparent',
                            ],
                        ];
                    }
                }
                break;
            case 2 :
                $category = 2;
                $mot_sum = (number_format((double)$response->Mot->row->MotPrem, 0, '.', ' ') ?? 0);
                $list = [
                    [
                        'types' => 'Премии оплаченные / (План)',
                        'sum' => (number_format((double)$response->Mot->row->AmountF, 0, '.', ' ') ?? 0).' '.'/'.' '.(number_format((double)$response->Mot->row->Plan, 0, '.', ' ') ?? 0),
                        'color' => (double)$response->Mot->row->SharePlan ?? 0 > 1000000 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Выполнение (>100%)',
                        'sum' => (number_format((double)$response->Mot->row->SharePlan, 0, '.', ' ') ?? 0).'%',
                        'color' => ((double)$response->Mot->row->SharePlan ?? 0) > 100 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость*',
                        'sum' => ((double)$response->Mot->row->Rentability ?? 0).'%',
                        'color' => 'transparent'
                    ],
                    [
                        'types' => 'Премия*',
                        'sum' => (number_format((double)$response->Mot->row->PremMOT, 0,'.','') ?? 0),
                        'color' => 'transparent'
                    ],
                ];
                break;
            case 3 :
                $category = 3;
                $mot_sum = (number_format((double)$response->Mot->row[0]->TotalPrem + $response->Mot->row[1]->TotalPrem, 0, '.', ' ') ?? 0);
                $list = [
                    [
                        'types' => '<b>ОГПО<b>',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Премии оплаченные',
                        'sum' => (number_format((double)$response->Mot->row[0]->AmountF, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации',
                        'sum' => '3%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'К оплате по ОГПО',
                        'sum' => (number_format((double)$response->Mot->row[0]->TotalPrem, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '<b>Иные классы страхования<b>*',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Премии оплаченные',
                        'sum' => (number_format((double)$response->Mot->row[1]->AmountF, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => '% мотивации',
                        'sum' => '9%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'К оплате по иным классам страхования',
                        'sum' => (number_format((double)$response->Mot->row[1]->TotalPrem, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                ];
                break;
            case 4 :
                $category = 4;
                $mot_sum = (number_format((double)$response->Mot->row->TotalMot, 0, '.', ' ') ?? 0);
                $list = [
                    [
                        'types' => 'Премии оплаченные / (План)',
                        'sum' => (number_format((double)$response->Mot->row->AmountF, 0, '.', ' ') ?? 0).' '.'/'.' '.(number_format((double)$response->Mot->row->Plan, 0, '.', ' ') ?? 0),
                        'color' => (double)$response->Mot->row->PercPlan ?? 0 > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Выполнение(>100%)',
                        'sum' => (number_format((double)$response->Mot->row->PercPlan, 0, '.', ' ') ?? 0).'%',
                        'color' => (double)$response->Mot->row->PercPlan ?? 0 > 80 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Сборы по ОГПО ВТС*',
                        'sum' => (number_format(
                            (double)$response->Mot->row->SumVTS1
                            + (double)$response->Mot->row->SumVTS1
                            + (double)$response->Mot->row->SumVTS1)),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Мотивация по ОГПО ВТС',
                        'sum' => (number_format(
                            (double)$response->Mot->row->MotVTS1
                            + (double)$response->Mot->row->MotVTS1
                            + (double)$response->Mot->row->MotVTS1)),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Мотивация по иным классам*',
                        'sum' => (number_format((double)$response->Mot->row->MOTOther, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Коэффициент Выплат*',
                        'sum' => (number_format((double)$response->Mot->row->QU, 0, '.', ' ') ?? 0).'%',
                        'color' => 'transparent',
                    ],
                ];
                break;
            case 5 :
                $category = 5;
                $mot_sum = (number_format((double)$response->Mot->row->TotalMotSum, 0, '.', ' ') ?? 0);
                $list = [
                    [
                        'types' => 'Премии оплаченные',
                        'sum' => (number_format((double)$response->Mot->row->AmountF, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Базовый план*',
                        'sum' => (number_format((double)$response->Mot->row->Plan, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'План менеджеров',
                        'sum' => (number_format((double)$response->Mot->row->PlanM, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Выполнение базового плана',
                        'sum' => (number_format((double)$response->Mot->row->PercPlan, 0, '.', ' ') ?? 0).'%',
                        'color' => (double)$response->Mot->row->PercPlan ?? 0 > 100 ? 'green' : 'red',
                    ],
                    [
                        'types' => 'Себестоимость*',
                        'sum' => (number_format((double)$response->Mot->row->CostPrice, 0, '.', ' ') ?? 0).'%',
                        'color' => 'transparent',
                    ],
                    [
                        'types' => 'Размер мотивации*',
                        'sum' => (number_format((double)$response->Mot->row->MotSum, 0, '.', ' ') ?? 0),
                        'color' => 'transparent',
                    ],
                ];
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
