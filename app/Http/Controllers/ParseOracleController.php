<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Tests\StaticAnalysis\uniqueValues;

class ParseOracleController extends Controller
{
    static $departmentNames = [
        //ДКС
        1445780 => 'dks',
        1445781 => 'uks1',
        1445783 => 'uks2',
        1445784 => 'uks3',
        4989735 => 'uks4',
        4784106 => 'ukr',
        //ДСП
        3436143 => 'dsp',
        1445824 => 'almaty',
        4559142 => 'uap',
        1445789 => 'us1',
        1445790 => 'us2',
        1445791 => 'us3',
        1445792 => 'us4',
        1445793 => 'us5',
        3492324 => 'us6',
        3492327 => 'us7',
        //ДРПО
        3629955 => 'drpo',
        3991836 => 'upp',
        //ДП
        1445737 => 'dp',
        //Филиалы
        1445735 => 'nur_sultan',
        1445823 => 'aktobe',
        1445828 => 'shymkent',
        1445805 => 'koksh',
        1445822 => 'semei',
        1445799 => 'atyrau_obl',
        1445798 => 'aktobe_obl',
        1445801 => 'kar_obl',
        1445814 => 'kos_obl',
        1445818 => 'kyz_obl',
        1445797 => 'mang_obl',
        1445820 => 'pavlo_obl',
        1445825 => 'jambyl_obl',
        1445821 => 'sko',
        1445827 => 'vko',

        //Сайт
        3991842 => 'kupipolis',
        //Служба доставки и заявок
        1445755 => 'sdz', //emplName - kupipolis


        //Отделение страхования
        1445778 => 'os6',
        1445773 => 'os1',
        1445775 => 'os3',

        //Депт страховых выплат
        1445739 => 'dsv',

        //Управление сопровождения ДМС
        5004 => 'dms',


    ];

    public function getCollectDeptName($deptIsn)
    {
        return array_key_exists($deptIsn, self::$departmentNames) ? self::$departmentNames[$deptIsn] : false;
    }

    public function getOracleCollect(Request $request)
    {
        //фильтр Даты
        if (empty($request->days)) {
            if ($request->first_period < '10') {
                $first_date = '0' . $request->first_period . '.' . $request->first_year;
            } else {
                $first_date = $request->first_period . '.' . $request->first_year;
            }
            if ($request->second_period < '10') {
                $second_date = $request->second_period . '.' . $request->second_year;
            } else {
                $second_date = $request->second_period . '.' . $request->second_year;
            }
            if ($request->first_period >= '10') {
                $first_date = $request->first_period . '.' . $request->first_year;
            } else {
                $first_date = '0' . $request->first_period . '.' . $request->first_year;
            }
            if ($request->second_period >= '10') {
                $second_date = $request->second_period . '.' . $request->second_year;
            } else {
                $second_date = '0' . $request->second_period . '.' . $request->second_year;
            }
        } else {
            if ($request->first_period < '10') {
                $first_date = $request->days . '.' . '0' . $request->first_period . '.' . $request->first_year;
            } else {
                $first_date = $request->days . '.' . $request->first_period . '.' . $request->first_year;
            }
            if ($request->second_period < '10') {
                $second_date = $request->days . '.' . $request->second_period . '.' . $request->second_year;
            } else {
                $second_date = $request->days . '.' . $request->second_period . '.' . $request->second_year;
            }
            if ($request->first_period >= '10') {
                $first_date = $request->days . '.' . $request->first_period . '.' . $request->first_year;
            } else {
                $first_date = $request->days . '.' . '0' . $request->first_period . '.' . $request->first_year;
            }
            if ($request->second_period >= '10') {
                $second_date = $request->days . '.' . $request->second_period . '.' . $request->second_year;
            } else {
                $second_date = $request->days . '.' . '0' . $request->second_period . '.' . $request->second_year;
            }
        }

                if(!empty($request->days)){

                    $builder = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.dateAccept',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            DB::raw('FLOOR(SUM(parse_oracle_collects.brutto_prem)) AS brutto_prem'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.dsd)) AS dsd'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.comission_and_rating)) AS comission_and_rating'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.total_refund_sum, 0))) AS total_refund_sum'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.netto_refund_sum, 0))) AS netto_refund_sum'))
                        ->leftJoin('parse_oracle_collects', function ($join) {
                            $join->on('parse_oracle_plans.agrempl','=','parse_oracle_collects.empl_isn');
                        })
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','parse_oracle_plans.agrempl');
                            $join->on('parse_oracle_collects.dateAccept','parse_oracle_pays.dateAccept');
                        });
                    $collects = $builder->where('parse_oracle_collects.dateAccept','=', $first_date)
                        ->where('parse_oracle_plans.year','=', $request->first_year)
                        ->where('parse_oracle_plans.month','=',$request->first_period)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('parse_oracle_collects.dateAccept'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();

                    $model = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.dateAccept',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            DB::raw('FLOOR(SUM(parse_oracle_collects.brutto_prem)) AS brutto_prem'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.dsd)) AS dsd'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.comission_and_rating)) AS comission_and_rating'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.total_refund_sum, 0))) AS total_refund_sum'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.netto_refund_sum, 0))) AS netto_refund_sum'))
                        ->leftJoin('parse_oracle_collects', function ($join) {
                            $join->on('parse_oracle_plans.agrempl','=','parse_oracle_collects.empl_isn');
                        })
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','parse_oracle_plans.agrempl');
                            $join->on('parse_oracle_collects.dateAccept','parse_oracle_pays.dateAccept');
                        });
                    $collects2 = $model->where('parse_oracle_collects.dateAccept','=', $second_date)
                        ->where('parse_oracle_plans.year','=', $request->second_year)
                        ->where('parse_oracle_plans.month','=',$request->second_period)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('parse_oracle_collects.dateAccept'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();
                }else {
                    $builder = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            DB::raw('FLOOR(SUM(parse_oracle_collects.brutto_prem)) AS brutto_prem'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.dsd)) AS dsd'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.comission_and_rating)) AS comission_and_rating'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.total_refund_sum, 0))) AS total_refund_sum'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.netto_refund_sum, 0))) AS netto_refund_sum'))
                        ->leftJoin('parse_oracle_collects', function ($join) {
                            $join->on('parse_oracle_plans.agrempl','=','parse_oracle_collects.empl_isn');
                        })
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','parse_oracle_plans.agrempl');
                            $join->on('parse_oracle_collects.dateAccept','parse_oracle_pays.dateAccept');
                        });
                    $collects = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $first_date)
                        ->where('parse_oracle_plans.year','=', $request->first_year)
                        ->where('parse_oracle_plans.month','=',$request->first_period)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            //DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();

                    $model = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            DB::raw('FLOOR(SUM(parse_oracle_collects.brutto_prem)) AS brutto_prem'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.dsd)) AS dsd'),
                            DB::raw('FLOOR(SUM(parse_oracle_collects.comission_and_rating)) AS comission_and_rating'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.total_refund_sum, 0))) AS total_refund_sum'),
                            DB::raw('FLOOR(SUM(IFNULL(parse_oracle_pays.netto_refund_sum, 0))) AS netto_refund_sum'))
                        ->leftJoin('parse_oracle_collects', function ($join) {
                            $join->on('parse_oracle_plans.agrempl','=','parse_oracle_collects.empl_isn');
                        })
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','parse_oracle_plans.agrempl');
                            $join->on('parse_oracle_collects.dateAccept','parse_oracle_pays.dateAccept');
                        });
                    $collects2 = $model->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $second_date)
                        ->where('parse_oracle_plans.year','=', $request->second_year)
                        ->where('parse_oracle_plans.month','=',$request->second_period)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('parse_oracle_collects.dateAccept'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();
                }
                $firstResults = json_decode(json_encode($collects), true);
                $secondResults = json_decode(json_encode($collects2), true);

        $deptCollectFirst = [];
        $deptCollectSecond = [];
        foreach (self::$departmentNames as $departmentName) {
            $deptCollectFirst[$departmentName] = [];
            $deptCollectSecond[$departmentName] = [];
        }

        foreach ($firstResults as $collect) {
            $arrName = $this->getCollectDeptName($collect['dept_isn']);
            if (!$arrName)
                continue;
            $deptCollectFirst[$arrName][] = $collect;
        }

        foreach ($secondResults as $collect) {
            $arrName = $this->getCollectDeptName($collect['dept_isn']);
            if (!$arrName)
                continue;
            $deptCollectSecond[$arrName][] = $collect;
        }
        $dept_data = [
            [
                'empl_name' => 'ДКС',
                'children' => [
                        0 => [
                            'empl_name' => 'Менеджеры ДКС',
                            'agrempl' => 2,
                            'brutto_prem' => array_sum(array_column($deptCollectFirst['dks'], 'brutto_prem')),
                            'dsd' => array_sum(array_column($deptCollectFirst['dks'], 'dsd')),
                            'comission_and_rating' => array_sum(array_column($deptCollectFirst['dks'], 'comission_and_rating')),
                            'total_refund_sum' => array_sum(array_column($deptCollectFirst['dks'], 'total_refund_sum')),
                            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dks'], 'netto_refund_sum')),
                            'feesplan' => array_sum(array_column($deptCollectFirst['dks'], 'feesplan')),
                            'children' => $deptCollectFirst['dks'],
                        ],
                    1 => [
                        'empl_name' => 'УКС №1',
                        'agrempl' => 3,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks1'], 'feesplan')),
                        'children' => $deptCollectFirst['uks1'],
                    ],
                    2 => [
                        'empl_name' => 'УКС №2',
                        'agrempl' => 23454,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks2'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks2'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks2'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks2'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks2'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks2'], 'feesplan')),
                        'children' => $deptCollectFirst['uks2'],
                    ],
                    3 => [
                        'empl_name' => 'УКС №3',
                        'agrempl' => 52345,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks3'], 'feesplan')),
                        'children' => $deptCollectFirst['uks3'],
                    ],
                    4 => [
                        'empl_name' => 'УКС №4',
                        'agrempl' => 6,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks4'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks4'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks4'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks4'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks4'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks4'], 'feesplan')),
                        'children' => $deptCollectFirst['uks4'],
                    ],
                    5 => [
                        'empl_name' => 'УКР',
                        'agrempl' => 324257,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['ukr'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['ukr'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['ukr'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['ukr'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ukr'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['ukr'], 'feesplan')),
                        'children' => $deptCollectFirst['ukr'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДСП',
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДСП',
                        'agrempl' => 102,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['dsp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['dsp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['dsp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['dsp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dsp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['dsp'], 'feesplan')),
                        'children' => $deptCollectFirst['dsp'],
                    ],
                    1 => [
                        'empl_name' => 'г.Алматы',
                        'agrempl' => 103,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['almaty'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['almaty'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['almaty'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['almaty'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['almaty'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['almaty'], 'feesplan')),
                        'children' => $deptCollectFirst['almaty'],
                    ],
                    2 => [
                        'empl_name' => 'УАП',
                        'agrempl' => 104,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uap'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uap'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uap'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uap'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uap'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uap'], 'feesplan')),
                        'children' => $deptCollectFirst['uap'],
                    ],
                    3 => [
                        'empl_name' => 'УС №1',
                        'agrempl' => 105,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us1'], 'feesplan')),
                        'children' => $deptCollectFirst['us1'],
                    ],
                    4 => [
                        'empl_name' => 'УС №2',
                        'agrempl' => 106,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us2'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us2'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us2'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us2'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us2'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us2'], 'feesplan')),
                        'children' => $deptCollectFirst['us2'],
                    ],
                    5 => [
                        'empl_name' => 'УС №3',
                        'agrempl' => 107,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us3'], 'feesplan')),
                        'children' => $deptCollectFirst['us3'],
                    ],
                    6 => [
                        'empl_name' => 'УС №4',
                        'agrempl' => 108,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us4'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us4'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us4'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us4'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us4'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us4'], 'feesplan')),
                        'children' => $deptCollectFirst['us4'],
                    ],
                    7 => [
                        'empl_name' => 'УС №5',
                        'agrempl' => 109,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us5'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us5'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us5'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us5'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us5'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us5'], 'feesplan')),
                        'children' => $deptCollectFirst['us5'],
                    ],
                    8 => [
                        'empl_name' => 'УС №6',
                        'agrempl' => 110,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us6'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us6'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us6'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us6'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us6'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us6'], 'feesplan')),
                        'children' => $deptCollectFirst['us6'],
                    ],
                    9 => [
                        'empl_name' => 'УС №7',
                        'agrempl' => 111,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us7'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us7'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us7'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us7'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us7'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us7'], 'feesplan')),
                        'children' => $deptCollectFirst['us7'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДРПО',
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДРПО',
                        'agrempl' => 122,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['drpo'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['drpo'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['drpo'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['drpo'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['drpo'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['drpo'], 'feesplan')),
                        'children' => $deptCollectFirst['drpo'],
                    ],
                    1 => [
                        'empl_name' => 'г.Алматы',
                        'agrempl' => 123,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['upp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['upp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['upp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['upp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['upp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['upp'], 'feesplan')),
                        'children' => $deptCollectFirst['upp'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДП',
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДП',
                        'agrempl' => 132,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['dp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['dp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['dp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['dp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['dp'], 'feesplan')),
                        'children' => $deptCollectFirst['dp'],
                    ],
                ]
            ],
            [
                'empl_name' => 'Филиалы',
                'children' => [
                    0 => [
                        'empl_name' => 'Нур-Султан',
                        'agrempl' => 302,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'feesplan')),
                        'children' => $deptCollectFirst['nur_sultan'],
                    ],
                    1 => [
                        'empl_name' => 'Актобе',
                        'agrempl' => 303,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['aktobe'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['aktobe'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['aktobe'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['aktobe'], 'feesplan')),
                        'children' => $deptCollectFirst['aktobe'],
                    ],
                    2 => [
                        'empl_name' => 'Шымкент',
                        'agrempl' => 304,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['shymkent'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['shymkent'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['shymkent'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['shymkent'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['shymkent'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['shymkent'], 'feesplan')),
                        'children' => $deptCollectFirst['shymkent'],
                    ],
                    3 => [
                        'empl_name' => 'Кокшетау',
                        'agrempl' => 305,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['koksh'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['koksh'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['koksh'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['koksh'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['koksh'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['koksh'], 'feesplan')),
                        'children' => $deptCollectFirst['koksh'],
                    ],
                    4 => [
                        'empl_name' => 'Семей',
                        'agrempl' => 306,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['semei'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['semei'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['semei'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['semei'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['semei'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['semei'], 'feesplan')),
                        'children' => $deptCollectFirst['semei'],
                    ],
                    5 => [
                        'empl_name' => 'Атырауская обл.',
                        'agrempl' => 307,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['atyrau_obl'],
                    ],
                    6 => [
                        'empl_name' => 'Актюбинская обл.',
                        'agrempl' => 308,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['aktobe_obl'],
                    ],
                    7 => [
                        'empl_name' => 'Карагандинская обл.',
                        'agrempl' => 309,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kar_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kar_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kar_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kar_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kar_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kar_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kar_obl'],
                    ],
                    8 => [
                        'empl_name' => 'Костанайская обл.',
                        'agrempl' => 310,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kos_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kos_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kos_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kos_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kos_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kos_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kos_obl'],
                    ],
                    9 => [
                        'empl_name' => 'Кызылординская обл.',
                        'agrempl' => 31321441,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kyz_obl'],
                    ],
                    10 => [
                        'empl_name' => 'Мангыстауская обл.',
                        'agrempl' => 312,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['mang_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['mang_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['mang_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['mang_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['mang_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['mang_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['mang_obl'],
                    ],
                    11 => [
                        'empl_name' => 'Павлодарская обл.',
                        'agrempl' => 313,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['pavlo_obl'],
                    ],
                    12 => [
                        'empl_name' => 'Жамбылская обл.',
                        'agrempl' => 314,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['jambyl_obl'],
                    ],
                    13=> [
                        'empl_name' => 'СКО',
                        'agrempl' => 315,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['sko'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['sko'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['sko'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['sko'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['sko'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['sko'], 'feesplan')),
                        'children' => $deptCollectFirst['sko'],
                    ],
                    14=> [
                        'empl_name' => 'ВКО',
                        'agrempl' => 316,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['vko'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['vko'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['vko'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['vko'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['vko'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['vko'], 'feesplan')),
                        'children' => $deptCollectFirst['vko'],
                    ],
                ]
            ],
            [
                'empl_name' => 'kupipolis',
                'children' => [
                    0 => [
                        'empl_name' => 'kupipolis',
                        'agrempl' => 778,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kupipolis'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kupipolis'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kupipolis'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kupipolis'], 'feesplan')),
                        'children' => $deptCollectFirst['kupipolis'],
                    ],
                    1 => [
                        'empl_name' => 'Служба доставки и заявок',
                        'agrempl' => 779,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['sdz'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['sdz'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['sdz'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['sdz'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['sdz'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['sdz'], 'feesplan')),
                        'children' => $deptCollectFirst['sdz'],
                    ],
                ]
            ],
            [
                'empl_name' => 'Отдел страхования',
                'children' => [
                    0 => [
                        'empl_name' => 'Отдел страхования №1',
                        'agrempl' => 402,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os1'], 'feesplan')),
                        'children' => $deptCollectFirst['os1'],
                    ],
                    1 => [
                        'empl_name' => 'Отдел страхования №3',
                        'agrempl' => 403,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os3'], 'feesplan')),
                        'children' => $deptCollectFirst['os3'],
                    ],
                    2 => [
                        'empl_name' => 'Отдел страхования №6',
                        'agrempl' => 404,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os6'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os6'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os6'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os6'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os6'], 'feesplan')),
                        'children' => $deptCollectFirst['os6'],
                    ],
                ]
            ],
        ];

        $dksb = array_sum(array_column($dept_data[0]['children'], 'brutto_prem'));
        $dksd = array_sum(array_column($dept_data[0]['children'], 'dsd'));
        $cr = array_sum(array_column($dept_data[0]['children'], 'comission_and_rating'));
        $total = array_sum(array_column($dept_data[0]['children'], 'total_refund_sum'));
        $netto = array_sum(array_column($dept_data[0]['children'], 'netto_refund_sum'));
        $dksp = array_sum(array_column($dept_data[0]['children'], 'feesplan'));

        $dsp_b = array_sum(array_column($dept_data[1]['children'], 'brutto_prem'));
        $dsp_d = array_sum(array_column($dept_data[1]['children'], 'dsd'));
        $dsp_c = array_sum(array_column($dept_data[1]['children'], 'comission_and_rating'));
        $dsp_t = array_sum(array_column($dept_data[1]['children'], 'total_refund_sum'));
        $dsp_n = array_sum(array_column($dept_data[1]['children'], 'netto_refund_sum'));
        $dsp_p = array_sum(array_column($dept_data[1]['children'], 'feesplan'));

        $drpo_b = array_sum(array_column($dept_data[2]['children'], 'brutto_prem'));
        $drpo_d = array_sum(array_column($dept_data[2]['children'], 'dsd'));
        $drpo_c = array_sum(array_column($dept_data[2]['children'], 'comission_and_rating'));
        $drpo_t = array_sum(array_column($dept_data[2]['children'], 'total_refund_sum'));
        $drpo_n = array_sum(array_column($dept_data[2]['children'], 'netto_refund_sum'));
        $drpo_p = array_sum(array_column($dept_data[2]['children'], 'feesplan'));

        $dp_b = array_sum(array_column($dept_data[3]['children'], 'brutto_prem'));
        $dp_d = array_sum(array_column($dept_data[3]['children'], 'dsd'));
        $dp_c = array_sum(array_column($dept_data[3]['children'], 'comission_and_rating'));
        $dp_t = array_sum(array_column($dept_data[3]['children'], 'total_refund_sum'));
        $dp_n = array_sum(array_column($dept_data[3]['children'], 'netto_refund_sum'));
        $dp_p = array_sum(array_column($dept_data[3]['children'], 'feesplan'));

        $fil_b = array_sum(array_column($dept_data[4]['children'], 'brutto_prem'));
        $fil_d = array_sum(array_column($dept_data[4]['children'], 'dsd'));
        $fil_c = array_sum(array_column($dept_data[4]['children'], 'comission_and_rating'));
        $fil_t = array_sum(array_column($dept_data[4]['children'], 'total_refund_sum'));
        $fil_n = array_sum(array_column($dept_data[4]['children'], 'netto_refund_sum'));
        $fil_p = array_sum(array_column($dept_data[4]['children'], 'feesplan'));

        $kupi_b = array_sum(array_column($dept_data[5]['children'], 'brutto_prem'));
        $kupi_d = array_sum(array_column($dept_data[5]['children'], 'dsd'));
        $kupi_c = array_sum(array_column($dept_data[5]['children'], 'comission_and_rating'));
        $kupi_t = array_sum(array_column($dept_data[5]['children'], 'total_refund_sum'));
        $kupi_n = array_sum(array_column($dept_data[5]['children'], 'netto_refund_sum'));
        $kupi_p = array_sum(array_column($dept_data[5]['children'], 'feesplan'));

        $os_b = array_sum(array_column($dept_data[6]['children'], 'brutto_prem'));
        $os_d = array_sum(array_column($dept_data[6]['children'], 'dsd'));
        $os_c = array_sum(array_column($dept_data[6]['children'], 'comission_and_rating'));
        $os_t = array_sum(array_column($dept_data[6]['children'], 'total_refund_sum'));
        $os_n = array_sum(array_column($dept_data[6]['children'], 'netto_refund_sum'));
        $os_p = array_sum(array_column($dept_data[6]['children'], 'feesplan'));

        $data = [
            [
                'empl_name' => 'ДКС',
                'agrempl' => 1,
                'brutto_prem' => $dksb,
                'dsd' => $dksd,
                'comission_and_rating' => $cr,
                'total_refund_sum' => $total,
                'netto_refund_sum' =>$netto,
                'feesplan' => $dksp,
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДКС',
                        'agrempl' => 2,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['dks'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['dks'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['dks'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['dks'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dks'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['dks'], 'feesplan')),
                        'children' => $deptCollectFirst['dks'],
                    ],
                    1 => [
                        'empl_name' => 'УКС №1',
                        'agrempl' => 3,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks1'], 'feesplan')),
                        'children' => $deptCollectFirst['uks1'],
                    ],
                    2 => [
                        'empl_name' => 'УКС №2',
                        'agrempl' => 23454,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks2'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks2'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks2'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks2'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks2'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks2'], 'feesplan')),
                        'children' => $deptCollectFirst['uks2'],
                    ],
                    3 => [
                        'empl_name' => 'УКС №3',
                        'agrempl' => 52345,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks3'], 'feesplan')),
                        'children' => $deptCollectFirst['uks3'],
                    ],
                    4 => [
                        'empl_name' => 'УКС №4',
                        'agrempl' => 6,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uks4'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uks4'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uks4'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uks4'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uks4'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uks4'], 'feesplan')),
                        'children' => $deptCollectFirst['uks4'],
                    ],
                    5 => [
                        'empl_name' => 'УКР',
                        'agrempl' => 324257,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['ukr'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['ukr'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['ukr'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['ukr'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ukr'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['ukr'], 'feesplan')),
                        'children' => $deptCollectFirst['ukr'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДСП',
                'agrempl' => 101,
                'brutto_prem' => $dsp_b,
                'dsd' => $dsp_d,
                'comission_and_rating' => $dsp_c,
                'total_refund_sum' => $dsp_t,
                'netto_refund_sum' =>$dsp_n,
                'feesplan' => $dsp_p,
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДСП',
                        'agrempl' => 102,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['dsp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['dsp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['dsp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['dsp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dsp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['dsp'], 'feesplan')),
                        'children' => $deptCollectFirst['dsp'],
                    ],
                    1 => [
                        'empl_name' => 'г.Алматы',
                        'agrempl' => 103,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['almaty'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['almaty'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['almaty'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['almaty'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['almaty'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['almaty'], 'feesplan')),
                        'children' => $deptCollectFirst['almaty'],
                    ],
                    2 => [
                        'empl_name' => 'УАП',
                        'agrempl' => 104,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['uap'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['uap'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['uap'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['uap'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['uap'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['uap'], 'feesplan')),
                        'children' => $deptCollectFirst['uap'],
                    ],
                    3 => [
                        'empl_name' => 'УС №1',
                        'agrempl' => 105,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us1'], 'feesplan')),
                        'children' => $deptCollectFirst['us1'],
                    ],
                    4 => [
                        'empl_name' => 'УС №2',
                        'agrempl' => 106,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us2'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us2'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us2'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us2'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us2'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us2'], 'feesplan')),
                        'children' => $deptCollectFirst['us2'],
                    ],
                    5 => [
                        'empl_name' => 'УС №3',
                        'agrempl' => 107,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us3'], 'feesplan')),
                        'children' => $deptCollectFirst['us3'],
                    ],
                    6 => [
                        'empl_name' => 'УС №4',
                        'agrempl' => 108,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us4'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us4'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us4'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us4'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us4'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us4'], 'feesplan')),
                        'children' => $deptCollectFirst['us4'],
                    ],
                    7 => [
                        'empl_name' => 'УС №5',
                        'agrempl' => 109,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us5'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us5'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us5'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us5'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us5'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us5'], 'feesplan')),
                        'children' => $deptCollectFirst['us5'],
                    ],
                    8 => [
                        'empl_name' => 'УС №6',
                        'agrempl' => 110,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us6'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us6'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us6'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us6'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us6'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us6'], 'feesplan')),
                        'children' => $deptCollectFirst['us6'],
                    ],
                    9 => [
                        'empl_name' => 'УС №7',
                        'agrempl' => 111,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['us7'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['us7'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['us7'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['us7'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['us7'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['us7'], 'feesplan')),
                        'children' => $deptCollectFirst['us7'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДРПО',
                'agrempl' => 121,
                'brutto_prem' => $drpo_b,
                'dsd' => $drpo_d,
                'comission_and_rating' => $drpo_c,
                'total_refund_sum' => $drpo_t,
                'netto_refund_sum' =>$drpo_n,
                'feesplan' => $drpo_p,
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДРПО',
                        'agrempl' => 122,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['drpo'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['drpo'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['drpo'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['drpo'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['drpo'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['drpo'], 'feesplan')),
                        'children' => $deptCollectFirst['drpo'],
                    ],
                    1 => [
                        'empl_name' => 'г.Алматы',
                        'agrempl' => 123,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['upp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['upp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['upp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['upp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['upp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['upp'], 'feesplan')),
                        'children' => $deptCollectFirst['upp'],
                    ],
                ]
            ],
            [
                'empl_name' => 'ДП',
                'agrempl' => 131,
                'brutto_prem' => $dp_b,
                'dsd' => $dp_d,
                'comission_and_rating' => $dp_c,
                'total_refund_sum' => $dp_t,
                'netto_refund_sum' =>$dp_n,
                'feesplan'=> $dp_p,
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДП',
                        'agrempl' => 132,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['dp'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['dp'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['dp'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['dp'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['dp'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['dp'], 'feesplan')),
                        'children' => $deptCollectFirst['dp'],
                    ],
                ]
            ],
            [
                'empl_name' => 'Филиалы',
                'agrempl' => 3032441,
                'brutto_prem' => $fil_b,
                'dsd' => $fil_d,
                'comission_and_rating' => $fil_c,
                'total_refund_sum' => $fil_t,
                'netto_refund_sum' =>$fil_n,
                'feesplan' => $fil_p,
                'children' => [
                    0 => [
                        'empl_name' => 'Нур-Султан',
                        'agrempl' => 302,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['nur_sultan'], 'feesplan')),
                        'children' => $deptCollectFirst['nur_sultan'],
                    ],
                    1 => [
                        'empl_name' => 'Актобе',
                        'agrempl' => 303,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['aktobe'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['aktobe'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['aktobe'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['aktobe'], 'feesplan')),
                        'children' => $deptCollectFirst['aktobe'],
                    ],
                    2 => [
                        'empl_name' => 'Шымкент',
                        'agrempl' => 304,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['shymkent'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['shymkent'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['shymkent'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['shymkent'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['shymkent'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['shymkent'], 'feesplan')),
                        'children' => $deptCollectFirst['shymkent'],
                    ],
                    3 => [
                        'empl_name' => 'Кокшетау',
                        'agrempl' => 305,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['koksh'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['koksh'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['koksh'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['koksh'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['koksh'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['koksh'], 'feesplan')),
                        'children' => $deptCollectFirst['koksh'],
                    ],
                    4 => [
                        'empl_name' => 'Семей',
                        'agrempl' => 306,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['semei'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['semei'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['semei'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['semei'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['semei'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['semei'], 'feesplan')),
                        'children' => $deptCollectFirst['semei'],
                    ],
                    5 => [
                        'empl_name' => 'Атырауская обл.',
                        'agrempl' => 307,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['atyrau_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['atyrau_obl'],
                    ],
                    6 => [
                        'empl_name' => 'Актюбинская обл.',
                        'agrempl' => 308,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['aktobe_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['aktobe_obl'],
                    ],
                    7 => [
                        'empl_name' => 'Карагандинская обл.',
                        'agrempl' => 309,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kar_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kar_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kar_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kar_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kar_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kar_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kar_obl'],
                    ],
                    8 => [
                        'empl_name' => 'Костанайская обл.',
                        'agrempl' => 310,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kos_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kos_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kos_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kos_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kos_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kos_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kos_obl'],
                    ],
                    9 => [
                        'empl_name' => 'Кызылординская обл.',
                        'agrempl' => 31321441,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kyz_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['kyz_obl'],
                    ],
                    10 => [
                        'empl_name' => 'Мангыстауская обл.',
                        'agrempl' => 312,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['mang_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['mang_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['mang_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['mang_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['mang_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['mang_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['mang_obl'],
                    ],
                    11 => [
                        'empl_name' => 'Павлодарская обл.',
                        'agrempl' => 313,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['pavlo_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['pavlo_obl'],
                    ],
                    12 => [
                        'empl_name' => 'Жамбылская обл.',
                        'agrempl' => 314,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['jambyl_obl'], 'feesplan')),
                        'children' => $deptCollectFirst['jambyl_obl'],
                    ],
                    13=> [
                        'empl_name' => 'СКО',
                        'agrempl' => 315,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['sko'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['sko'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['sko'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['sko'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['sko'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['sko'], 'feesplan')),
                        'children' => $deptCollectFirst['sko'],
                    ],
                    14=> [
                        'empl_name' => 'ВКО',
                        'agrempl' => 316,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['vko'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['vko'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['vko'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['vko'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['vko'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['vko'], 'feesplan')),
                        'children' => $deptCollectFirst['vko'],
                    ],
                ]
            ],
            [
                'empl_name' => 'kupipolis',
                'agrempl' => 772347,
                'brutto_prem' => $kupi_b,
                'dsd' => $kupi_d,
                'comission_and_rating' => $kupi_c,
                'total_refund_sum' => $kupi_t,
                'netto_refund_sum' =>$kupi_n,
                'feesplan' => $kupi_p,
                'children' => [
                    0 => [
                        'empl_name' => 'kupipolis',
                        'agrempl' => 778,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['kupipolis'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['kupipolis'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['kupipolis'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['kupipolis'], 'feesplan')),
                        'children' => $deptCollectFirst['kupipolis'],
                    ],
                    1 => [
                        'empl_name' => 'Служба доставки и заявок',
                        'agrempl' => 779,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['sdz'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['sdz'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['sdz'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['sdz'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['sdz'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['sdz'], 'feesplan')),
                        'children' => $deptCollectFirst['sdz'],
                    ],
                ]
            ],
            [
                'empl_name' => 'Отдел страхования',
                'agrempl' => 432401,
                'brutto_prem' => $os_b,
                'dsd' => $os_d,
                'comission_and_rating' => $os_c,
                'total_refund_sum' => $os_t,
                'netto_refund_sum' =>$os_n,
                'feesplan' => $os_p,
                'children' => [
                    0 => [
                        'empl_name' => 'Отдел страхования №1',
                        'agrempl' => 402,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os1'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os1'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os1'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os1'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os1'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os1'], 'feesplan')),
                        'children' => $deptCollectFirst['os1'],
                    ],
                    1 => [
                        'empl_name' => 'Отдел страхования №3',
                        'agrempl' => 403,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os3'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os3'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os3'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os3'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os3'], 'feesplan')),
                        'children' => $deptCollectFirst['os3'],
                    ],
                    2 => [
                        'empl_name' => 'Отдел страхования №6',
                        'agrempl' => 404,
                        'brutto_prem' => array_sum(array_column($deptCollectFirst['os6'], 'brutto_prem')),
                        'dsd' => array_sum(array_column($deptCollectFirst['os6'], 'dsd')),
                        'comission_and_rating' => array_sum(array_column($deptCollectFirst['os3'], 'comission_and_rating')),
                        'total_refund_sum' => array_sum(array_column($deptCollectFirst['os6'], 'total_refund_sum')),
                        'netto_refund_sum' => array_sum(array_column($deptCollectFirst['os6'], 'netto_refund_sum')),
                        'feesplan' => array_sum(array_column($deptCollectFirst['os6'], 'feesplan')),
                        'children' => $deptCollectFirst['os6'],
                    ],
                ]
            ],
        ];
        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }
}
