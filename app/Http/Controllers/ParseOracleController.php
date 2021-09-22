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
            'rise',
            'date',
            'dayTo_day'
        ];
    }
    public function getMonthLabel(){
        return [
            1=>'Янв',
            2=>'Фев',
            3=>'Мар',
            4=>'Апр',
            5=>'Май',
            6=>'Июн',
            7=>'Июл',
            8=>'Авг',
            9=>'Сен',
            10=>'Окт',
            11=>'Ноя',
            12=>'Дек',
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
        $firstDays = $request->first_days;
        $secondDays = $request->second_days;
        $dateType = $request->dateType ?? 'rise';

        //фильтр Даты
        if (0 < $firstPeriod && $firstPeriod < '10' && empty($day)) {
            $firstDate = '0' . $firstPeriod . '.' . $firstYear;
        }else if($firstPeriod >= '10' && empty($day)) {
            $firstDate = $firstPeriod . '.' . $firstYear;
        }else if($firstPeriod < '10' && isset($day)){
            $firstDate = $day . '.' . '0' . $firstPeriod . '.' . $firstYear;
        }else if($firstPeriod >= '10' && isset($day)){
            $firstDate = $day . '.' . $firstPeriod . '.' .$firstYear;
        }

        if(empty($firstPeriod) && empty($day)){
            $firstDate = $firstYear;
        }

        if(0 < $secondPeriod && $secondPeriod < '10' && empty($day)){
            $secondDate = '0' . $secondPeriod . '.' . $secondYear;
        }else if($secondPeriod >='10' && empty($day)){
            $secondDate = $secondPeriod . '.' . $secondYear;
        }else if($secondPeriod < '10' && isset($day)){
            $secondDate = $day . '.' . '0' . $secondPeriod . '.' . $secondYear;
        }else if($secondPeriod >= '10' && isset($day)){
            $secondDate = $day . '.' . $secondPeriod . '.' . $secondYear;
        }

        if(empty($secondPeriod) && empty($day)){
            $secondDate = $secondYear;
        }

        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month'){
                $label_first = $this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod].' '.$secondYear;

                $builder = DB::table('parse_oracle_plans')
                    ->select(
                        'parse_oracle_plans.feesplan',
                        'parse_oracle_plans.agrempl',
                        'parse_oracle_collects.empl_name',
                        DB::raw('substr(parse_oracle_collects.dateAccept,4)'),
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
                $collects = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $firstDate)
                    ->where('parse_oracle_plans.year','=', $firstYear)
                    ->where('parse_oracle_plans.month','=',$firstPeriod)
                    ->groupBy(
                        DB::raw('parse_oracle_plans.agrempl'),
                        DB::raw('parse_oracle_plans.feesplan'),
                        DB::raw('parse_oracle_collects.empl_name'),
                        DB::raw('substr(parse_oracle_collects.dateAccept,4)'),
                        DB::raw('parse_oracle_collects.dept_isn'),
                        DB::raw('parse_oracle_collects.dept_name'))
                    ->get()->toArray();

                $model = DB::table('parse_oracle_plans')
                    ->select(
                        'parse_oracle_plans.feesplan',
                        'parse_oracle_plans.agrempl',
                        'parse_oracle_collects.empl_name',
                        DB::raw('substr(parse_oracle_collects.dateAccept,4)'),
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
                $collects2 = $model->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $secondDate)
                    ->where('parse_oracle_plans.year','=', $secondYear)
                    ->where('parse_oracle_plans.month','=',$secondPeriod)
                    ->groupBy(
                        DB::raw('parse_oracle_plans.agrempl'),
                        DB::raw('parse_oracle_plans.feesplan'),
                        DB::raw('parse_oracle_collects.empl_name'),
                        DB::raw('substr(parse_oracle_collects.dateAccept,4)'),
                        DB::raw('parse_oracle_collects.dept_isn'),
                        DB::raw('parse_oracle_collects.dept_name'))
                    ->get()->toArray();
            }

        elseif ($dateType == 'year'){
                //Суммировать показатели менеджеров за год
              $label_first = $firstYear;
              $label_second = $secondYear;

              $builder = DB::table('parse_oracle_plans')
                  ->select(
                      'parse_oracle_plans.feesplan',
                      'parse_oracle_plans.agrempl',
                      'parse_oracle_collects.empl_name',
                      DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),
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
              $collects = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),'=', $secondYear)
                  ->where('parse_oracle_plans.year','=', $secondYear)
                  ->groupBy(
                      DB::raw('parse_oracle_plans.agrempl'),
                      DB::raw('parse_oracle_plans.feesplan'),
                      DB::raw('parse_oracle_collects.empl_name'),
                      DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),
                      DB::raw('parse_oracle_collects.dept_isn'),
                      DB::raw('parse_oracle_collects.dept_name'))
                  ->get()->toArray();

            $model = DB::table('parse_oracle_plans')
                ->select(
                    'parse_oracle_plans.feesplan',
                    'parse_oracle_plans.agrempl',
                    'parse_oracle_collects.empl_name',
                    DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),
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
            $collects2 = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),'=', $secondYear)
                ->where('parse_oracle_plans.year','=', $secondYear)
                ->groupBy(
                    DB::raw('parse_oracle_plans.agrempl'),
                    DB::raw('parse_oracle_plans.feesplan'),
                    DB::raw('parse_oracle_collects.empl_name'),
                    DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),
                    DB::raw('parse_oracle_collects.dept_isn'),
                    DB::raw('parse_oracle_collects.dept_name'))
                ->get()->toArray();

            }

            elseif ($dateType == 'quarter'){
                $label_first = $firstPeriod.'кв. '.$firstYear;
                $label_second = $secondPeriod.'кв. '.$secondYear;

                for ($i = 1; $i<=3; $i++) {
                    $builder = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
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
                    $collects = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $firstDate)
                        ->where('parse_oracle_plans.year','=', $firstYear)
                        ->where('parse_oracle_plans.month','=',($firstPeriod)*3 + $i)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();

                    $model = DB::table('parse_oracle_plans')
                        ->select(
                            'parse_oracle_plans.feesplan',
                            'parse_oracle_plans.agrempl',
                            'parse_oracle_collects.empl_name',
                            DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
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
                    $collects2 = $model->where(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),'=', $firstDate)
                        ->where('parse_oracle_plans.year','=', $firstYear)
                        ->where('parse_oracle_plans.month','=',($firstPeriod)*3 + $i)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();
                }
                dd($collects,$collects2);
            }
            elseif ($dateType == 'date'){
                $label_first =  $day.' '.$this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $day.' '.$this->getMonthLabel()[$secondPeriod].' '.$secondYear;

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
                $collects = $builder->where('parse_oracle_collects.dateAccept', $firstDate)
                    ->where('parse_oracle_plans.year',$firstYear)
                    ->where('parse_oracle_plans.month',$firstPeriod)
                    ->groupBy(
                        DB::raw('parse_oracle_plans.agrempl'),
                        DB::raw('parse_oracle_plans.feesplan'),
                        DB::raw('parse_oracle_collects.empl_name'),
                        DB::raw('parse_oracle_collects.dateAccept'),
                        DB::raw('parse_oracle_collects.dept_isn'),
                        DB::raw('parse_oracle_collects.dept_name'))
                    ->get()->toArray();

            }
        }

        /*elseif ($dateType == 'dayTo_day'){

            if(empty($secondPeriod) && empty($secondYear)){
                $secondPeriod = $firstPeriod;
                $secondYear = $firstYear;
            }

            $firstDate = $firstDays.'.'.$firstPeriod.'.'.$firstYear;
            $secondDate = $secondDays.'.'.$secondPeriod.'.'.$secondYear;

            $label_first =  $firstDays.' '.$this->getMonthLabel()[$firstPeriod].' '.$firstYear;
            $label_second = $secondDays.' '.$this->getMonthLabel()[$secondPeriod].' '.$secondYear;

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
            $collects = $builder->where('parse_oracle_collects.dateAccept', $firstDate)
                ->where('parse_oracle_plans.year',$firstYear)
                ->where('parse_oracle_plans.month',$firstPeriod)
                ->groupBy(
                    DB::raw('parse_oracle_plans.agrempl'),
                    DB::raw('parse_oracle_plans.feesplan'),
                    DB::raw('parse_oracle_collects.empl_name'),
                    DB::raw('parse_oracle_collects.dateAccept'),
                    DB::raw('parse_oracle_collects.dept_isn'),
                    DB::raw('parse_oracle_collects.dept_name'))
                ->get()->toArray();

            /*                $model = DB::table('parse_oracle_plans')
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
                            $collects2 = $builder->where('parse_oracle_collects.dateAccept', $secondDate)
                                ->where('parse_oracle_plans.year',$secondYear)
                                ->where('parse_oracle_plans.month',$secondPeriod)
                                ->groupBy(
                                    DB::raw('parse_oracle_plans.agrempl'),
                                    DB::raw('parse_oracle_plans.feesplan'),
                                    DB::raw('parse_oracle_collects.empl_name'),
                                    DB::raw('parse_oracle_collects.dateAccept'),
                                    DB::raw('parse_oracle_collects.dept_isn'),
                                    DB::raw('parse_oracle_collects.dept_name'))
                                ->get()->toArray();*/

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

        //Управления
        $Mdks = [
            'Менеджер ДКС' => $deptCollectSecond['ДКС'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДКС'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДКС'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДКС'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДКС'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДКС'], 'total_refund_sum'))
        ];

        $uks1 = [
            'УКС1' => $deptCollectSecond['УКС1'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'total_refund_sum'))
        ];

        $uks2 = [
            'УКС2' => $deptCollectSecond['УКС2'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС2'], 'total_refund_sum'))
        ];
        $uks3 = [
            'УКС3' => $deptCollectSecond['УКС3'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС3'], 'total_refund_sum'))
        ];
        $uks4 = [
            'УКС4' => $deptCollectSecond['УКС4'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС4'], 'total_refund_sum'))
        ];
        $ukr = [
            'УКР' => $deptCollectSecond['УКР'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКР'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКР'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКР'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКР'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКР'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКР'], 'total_refund_sum'))
        ];

        $Mdsp = [
            'Менеджер ДСП' => $deptCollectSecond['ДСП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДСП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДСП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДСП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДСП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДСП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДСП'], 'total_refund_sum'))
        ];
        $almaty = [
            'г.Алматы' => $deptCollectSecond['г.Алматы'],
            'feesplan' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'total_refund_sum'))
        ];
        $uap = [
            'УАП' => $deptCollectSecond['УАП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УАП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УАП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УАП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УАП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УАП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УАП'], 'total_refund_sum'))
        ];
        $us1 = [
            'УС1' => $deptCollectSecond['УС1'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС1'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС1'], 'total_refund_sum'))
        ];
        $us2 = [
            'УС2' => $deptCollectSecond['УС2'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС2'], 'total_refund_sum'))
        ];
        $us3 = [
            'УС3' => $deptCollectSecond['УС3'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС3'], 'total_refund_sum'))
        ];
        $us4 = [
            'УС4' => $deptCollectSecond['УС4'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС4'], 'total_refund_sum'))
        ];
        $us5 = [
            'УС5' => $deptCollectSecond['УС5'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС5'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС5'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС5'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС5'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС5'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС5'], 'total_refund_sum'))
        ];
        $us6 = [
            'УС6' => $deptCollectSecond['УС6'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС6'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС6'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС6'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС6'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС6'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС6'], 'total_refund_sum'))
        ];
        $us7 = [
            'УС7' => $deptCollectSecond['УС7'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС7'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС7'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС7'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС7'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС7'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС7'], 'total_refund_sum'))
        ];

        $Mdrpo = [
            'feesplan' => array_sum(array_column($deptCollectFirst['ДРПО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДРПО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДРПО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДРПО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДРПО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДРПО'], 'total_refund_sum'))
        ];
        $upp = [
            'feesplan' => array_sum(array_column($deptCollectFirst['УПП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УПП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УПП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УПП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УПП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УПП'], 'total_refund_sum'))
        ];

        $Mdp = [
            'feesplan' => array_sum(array_column($deptCollectFirst['ДП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДП'], 'total_refund_sum'))
        ];

        $nur = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'total_refund_sum'))
        ];
        $aktobe = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Актобе'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Актобе'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Актобе'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Актобе'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Актобе'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Актобе'], 'total_refund_sum'))
        ];
        $shymkent = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Шымкент'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Шымкент'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Шымкент'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Шымкент'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Шымкент'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Шымкент'], 'total_refund_sum'))
        ];
        $koksh = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'total_refund_sum'))
        ];
        $semei = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Семей'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Семей'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Семей'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Семей'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Семей'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Семей'], 'total_refund_sum'))
        ];
        $atyrauObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'total_refund_sum'))
        ];
        $aktobeObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'total_refund_sum'))
        ];
        $karagandaObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'total_refund_sum'))
        ];
        $kostanaiObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'total_refund_sum'))
        ];
        $kyzylObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'total_refund_sum'))
        ];
        $mangystObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'total_refund_sum'))
        ];
        $pavlObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'total_refund_sum'))
        ];
        $jambylObl = [
            'feesplan' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'total_refund_sum'))
        ];
        $sko = [
            'feesplan' => array_sum(array_column($deptCollectFirst['СКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['СКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['СКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['СКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['СКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['СКО'], 'total_refund_sum'))
        ];
        $vko = [
            'feesplan' => array_sum(array_column($deptCollectFirst['ВКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ВКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ВКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ВКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ВКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ВКО'], 'total_refund_sum'))
        ];

        //Департаменты
        $dks = [
            'Менеджер ДКС' => $Mdks,
            'УКС1' => $uks1,
            'УКС2' => $uks2,
            'УКС3' => $uks3,
            'УКС4' => $uks4,
            'УКР' => $ukr,
        ];
        $dsp = [
            'Менеджер ДСП' => $Mdsp,
            'г.Алматы' => $almaty,
            'УАП' => $uap,
            'УС1' => $us1,
            'УС2' => $us2,
            'УС3' => $us3,
            'УС4' => $us4,
            'УС5' => $us5,
            'УС6' => $us6,
            'УС7' => $us7,
        ];
        $drpo = [
            'Менеджер ДРПО' => $Mdrpo,
            'УПП' => $upp,
        ];
        $dp = [
            'ДП' => $Mdp
        ];
        $filials = [
            'Нур-Султан' =>$nur,
            'Актобе' =>$aktobe,
            'Шымкент' =>$shymkent,
            'Кокшетау' =>$koksh,
            'Семей' =>$semei,
            'Атырауская облась' =>$atyrauObl,
            'Актюбинская область' =>$aktobeObl,
            'Карагандинская область' =>$karagandaObl,
            'Костанайская область' =>$kostanaiObl,
            'Кызылординская область' =>$kyzylObl,
            'Мангыстауская область' =>$mangystObl,
            'Павлодарская область' =>$pavlObl,
            'Жамбылская область' =>$jambylObl,
            'СКО' =>$sko,
            'ВКО'=>$vko
        ];
        $kupipolis = [
            'kupipolis' => $deptCollectFirst['kupipolis'],
            'СДЗ'=> $deptCollectFirst['СДЗ'],
        ];
        $os = [
            'Отделение страхования 6' =>$deptCollectFirst['Отделение страхования 6'],
            'Отделение страхования 1' =>$deptCollectFirst['Отделение страхования 1'],
            'Отделение страхования 3' =>$deptCollectFirst['Отделение страхования 3'],
        ];
        $dsv = [
            'ДСВ' =>$deptCollectFirst['ДСВ']
        ];
        $dms = [
            'ДМС' =>$deptCollectFirst['ДМС']
        ];

        //Департаменты - 2
        $dks2 = [
            'Менеджер ДКС' => $deptCollectSecond['ДКС'],
            'УКС1' => $deptCollectSecond['УКС1'],
            'УКС2' => $deptCollectSecond['УКС2'],
            'УКС3' => $deptCollectSecond['УКС3'],
            'УКС4' => $deptCollectSecond['УКС4'],
            'УКР' => $deptCollectSecond['УКР'],
        ];
        $dsp2 = [
            'Менеджер ДСП' => $deptCollectSecond['ДСП'],
            'г.Алматы' => $deptCollectSecond['г.Алматы'],
            'УАП' => $deptCollectSecond['УАП'],
            'УС1' => $deptCollectSecond['УС1'],
            'УС2' => $deptCollectSecond['УС2'],
            'УС3' => $deptCollectSecond['УС3'],
            'УС4' => $deptCollectSecond['УС4'],
            'УС5' => $deptCollectSecond['УС5'],
            'УС6' => $deptCollectSecond['УС6'],
            'УС7' => $deptCollectSecond['УС7'],
        ];
        $drpo2 = [
            'Менеджер ДРПО' => $deptCollectSecond['ДРПО'],
            'УПП' => $deptCollectSecond['УПП'],
        ];
        $dp2 = [
            'ДП' => $deptCollectSecond['ДП']
        ];
        $filials2 = [
            'Нур-Султан' =>$deptCollectSecond['Нур-Султан'],
            'Актобе' =>$deptCollectSecond['Актобе'],
            'Шымкент' =>$deptCollectSecond['Шымкент'],
            'Кокшетау' =>$deptCollectSecond['Кокшетау'],
            'Семей' =>$deptCollectSecond['Семей'],
            'Атырауская облась' =>$deptCollectSecond['Атырауская облась'],
            'Актюбинская область' =>$deptCollectSecond['Актюбинская область'],
            'Карагандинская область' =>$deptCollectSecond['Карагандинская область'],
            'Костанайская область' =>$deptCollectSecond['Костанайская область'],
            'Кызылординская область' =>$deptCollectSecond['Кызылординская область'],
            'Мангыстауская область' =>$deptCollectSecond['Мангыстауская область'],
            'Павлодарская область' =>$deptCollectSecond['Павлодарская область'],
            'Жамбылская область' =>$deptCollectSecond['Жамбылская область'],
            'СКО' =>$deptCollectSecond['СКО'],
            'ВКО'=>$deptCollectSecond['ВКО']
        ];
        $kupipolis2 = [
            'kupipolis' => $deptCollectSecond['kupipolis'],
            'СДЗ'=> $deptCollectSecond['СДЗ'],
        ];
        $os2 = [
            'Отделение страхования 6' =>$deptCollectSecond['Отделение страхования 6'],
            'Отделение страхования 1' =>$deptCollectSecond['Отделение страхования 1'],
            'Отделение страхования 3' =>$deptCollectSecond['Отделение страхования 3'],
        ];
        $dsv2 = [
            'ДСВ' =>$deptCollectSecond['ДСВ']
        ];
        $dms2 = [
            'ДМС' =>$deptCollectSecond['ДМС']
        ];




        return response()->json([
            'success' => true,
            'data' => [
                'collects' => [
                    'ДКС'=> $dks,
                    'ДСП' => $dsp,
                    'ДРПО' => $drpo,
                    'ДП' => $dp,
                    'Филиалы' => $filials,
                    'kupipolis' => $kupipolis,
                    'Отдел страхования' => $os,
                    'ДСВ' => $dsv,
                    'ДМС' => $dms
                ],
                'collectsSecond' => [
                    'ДКС'=> $dks2,
                    'ДСП' => $dsp2,
                    'ДРПО' => $drpo2,
                    'ДП' => $dp2,
                    'Филиалы' => $filials2,
                    'kupipolis' => $kupipolis2,
                    'Отдел страхования' => $os2,
                    'ДСВ' => $dsv2,
                    'ДМС' => $dms2
                ],
                'label_first' => $label_first,
                'label_second' => $label_second,
            ]
        ]);

    }
}
