<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function foo\func;
use function Webmozart\Assert\Tests\StaticAnalysis\uniqueValues;

class ParseOracleController extends Controller
{
    static $departmentNames = [
        //ДКС
        1445780 => 'ДКС',
        1445781 => 'УКС1',
        1445783 => 'УКС2',
        1445784 => 'УКС3',
        4989735 => 'УКС4',
        4784106 => 'УКР',
        //ДСП
        3436143 => 'ДСП',
        1445824 => 'г.Алматы',
        4559142 => 'УАП',
        1445789 => 'УС1',
        1445790 => 'УС2',
        1445791 => 'УС3',
        1445792 => 'УС4',
        1445793 => 'УС5',
        3492324 => 'УС6',
        3492327 => 'УС7',
        //ДРПО
        3629955 => 'ДРПО',
        3991836 => 'УПП',
        //ДП
        1445737 => 'ДП',
        //Филиалы
        1445735 => 'Нур-Султан',
        1445823 => 'Актобе',
        1445828 => 'Шымкент',
        1445805 => 'Кокшетау',
        1445822 => 'Семей',
        1445799 => 'Атырауская облась',
        1445798 => 'Актюбинская область',
        1445801 => 'Карагандинская область',
        1445814 => 'Костанайская область',
        1445818 => 'Кызылординская область',
        1445797 => 'Мангыстауская область',
        1445820 => 'Павлодарская область',
        1445825 => 'Жамбылская область',
        1445821 => 'СКО',
        1445827 => 'ВКО',

        //Сайт
        3991842 => 'kupipolis',
        //Служба доставки и заявок
        1445755 => 'СДЗ', //emplName - kupipolis

        //Отделение страхования
        1445778 => 'Отделение страхования 6',
        1445773 => 'Отделение страхования 1',
        1445775 => 'Отделение страхования 3',

        //Депт страховых выплат
        1445739 => 'ДСВ',

        //Управление сопровождения ДМС
        5004 => 'ДМС',


    ];

    public function getCollectDeptName($deptIsn)
    {
        return array_key_exists($deptIsn, self::$departmentNames) ? self::$departmentNames[$deptIsn] : false;
    }

    public function dateTypes(){
        return [
            'month',
            'year',
            'quarter',
            'rise'
        ];
    }
    public function getMonthLabel(){
        return [
            'Янв',
            'Фев',
            'Мар',
            'Апр',
            'Май',
            'Июн',
            'Июл',
            'Авг',
            'Сен',
            'Окт',
            'Ноя',
            'Дек',
        ];
    }

    public function getOracleCollect(Request $request)
    {
        $label_first = '';
        $label_second = '';
        $firstPeriod = $request->first_period;
        $secondPeriod = $request->second_period;
        $firstYear = $request->first_year;
        $secondYear = $request->second_year;
        $day = $request->days;
        $dateType = $request->dateType ?? 'rise';

        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month'){
                $label_first = $this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod].' '.$secondYear;
            }
        }
        //фильтр Даты
        if (empty($day)) {
            if ($firstPeriod < '10') {
                $first_date = '0' . $firstPeriod . '.' . $firstYear;
            } else {
                $first_date = $firstPeriod . '.' . $firstYear;
            }
            if ($secondPeriod < '10') {
                $second_date = $secondPeriod . '.' . $secondYear;
            } else {
                $second_date = $secondPeriod . '.' . $secondYear;
            }

            if ($firstPeriod >= '10') {
                $first_date = $firstPeriod . '.' . $firstYear;
            } else {
                $first_date = '0' . $firstPeriod . '.' . $firstYear;
            }
            if ($firstPeriod >= '10') {
                $second_date = $secondPeriod . '.' . $secondYear;
            } else {
                $second_date = '0' . $secondPeriod . '.' . $secondYear;
            }
        } else {
            if ($firstPeriod < '10') {
                $first_date = $day . '.' . '0' . $firstPeriod . '.' . $firstYear;
            } else {
                $first_date = $day . '.' . $firstPeriod . '.' . $firstYear;
            }
            if ($request->second_period < '10') {
                $second_date = $day . '.' . $secondPeriod . '.' . $secondYear;
            } else {
                $second_date = $day . '.' . $secondPeriod . '.' . $secondYear;
            }
            if ($firstPeriod >= '10') {
                $first_date = $day . '.' . $firstPeriod . '.' .$firstYear;
            } else {
                $first_date = $day . '.' . '0' . $firstPeriod . '.' . $firstYear;
            }
            if ($request->second_period >= '10') {
                $second_date = $day . '.' . $secondPeriod . '.' . $secondYear;
            } else {
                $second_date = $day . '.' . '0' . $secondPeriod. '.' . $secondYear;
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
        //dd($deptCollectFirst);

        $dks = array_sum(array_column($deptCollectFirst['ДКС'], 'brutto_prem'));
        dd($dks);





        return response()->json([
            'success' => true,
            'data' => $deptCollectFirst,
        ]);

    }
}
