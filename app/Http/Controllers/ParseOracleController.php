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
              $collects = $builder->where(DB::raw('substr(parse_oracle_collects.dateAccept, 7)'),'=', $firstYear)
                  ->where('parse_oracle_plans.year','=', $firstYear)
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

            /*elseif ($dateType == 'quarter'){
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
                        ->where('parse_oracle_plans.month','=',$firstPeriod)
                        ->groupBy(
                            DB::raw('parse_oracle_plans.agrempl'),
                            DB::raw('parse_oracle_plans.feesplan'),
                            DB::raw('parse_oracle_collects.empl_name'),
                            DB::raw('substr(parse_oracle_collects.dateAccept, 4)'),
                            DB::raw('parse_oracle_collects.dept_isn'),
                            DB::raw('parse_oracle_collects.dept_name'))
                        ->get()->toArray();
                }

            }*/

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
                $collects2 = $model->where('parse_oracle_collects.dateAccept', $secondDate)
                    ->where('parse_oracle_plans.year',$secondYear)
                    ->where('parse_oracle_plans.month',$secondPeriod)
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
        }*/

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

        //ДКС
        $Mdks = [
            'Менеджер ДКС' => $deptCollectFirst['ДКС'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДКС'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДКС'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДКС'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДКС'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДКС'], 'total_refund_sum'))
        ];
        $uks1 = [
            'УКС1' => $deptCollectFirst['УКС1'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'total_refund_sum'))
        ];
        $uks2 = [
            'УКС2' => $deptCollectFirst['УКС2'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС2'], 'total_refund_sum'))
        ];
        $uks3 = [
            'УКС3' => $deptCollectFirst['УКС3'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС3'], 'total_refund_sum'))
        ];
        $uks4 = [
            'УКС4' => $deptCollectFirst['УКС4'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС4'], 'total_refund_sum'))
        ];
        $ukr = [
            'УКР' => $deptCollectFirst['УКР'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УКР'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКР'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКР'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УКР'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКР'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКР'], 'total_refund_sum'))
        ];
        //ДСП
        $Mdsp = [
            'Менеджер ДСП' => $deptCollectFirst['ДСП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДСП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДСП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДСП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДСП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДСП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДСП'], 'total_refund_sum'))
        ];
        $almaty = [
            'г.Алматы' => $deptCollectFirst['г.Алматы'],
            'feesplan' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['г.Алматы'], 'total_refund_sum'))
        ];
        $uap = [
            'УАП' => $deptCollectFirst['УАП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УАП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УАП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УАП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УАП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УАП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УАП'], 'total_refund_sum'))
        ];
        $us1 = [
            'УС1' => $deptCollectFirst['УС1'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС1'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС1'], 'total_refund_sum'))
        ];
        $us2 = [
            'УС2' => $deptCollectFirst['УС2'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС2'], 'total_refund_sum'))
        ];
        $us3 = [
            'УС3' => $deptCollectFirst['УС3'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС3'], 'total_refund_sum'))
        ];
        $us4 = [
            'УС4' => $deptCollectFirst['УС4'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС4'], 'total_refund_sum'))
        ];
        $us5 = [
            'УС5' => $deptCollectFirst['УС5'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС5'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС5'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС5'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС5'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС5'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС5'], 'total_refund_sum'))
        ];
        $us6 = [
            'УС6' => $deptCollectFirst['УС6'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС6'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС6'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС6'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС6'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС6'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС6'], 'total_refund_sum'))
        ];
        $us7 = [
            'УС7' => $deptCollectFirst['УС7'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УС7'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УС7'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УС7'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УС7'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УС7'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УС7'], 'total_refund_sum'))
        ];
        //ДРПО
        $Mdrpo = [
            'Менеджер ДРПО' => $deptCollectFirst['ДРПО'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДРПО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДРПО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДРПО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДРПО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДРПО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДРПО'], 'total_refund_sum'))
        ];
        $upp = [
            'УПП' => $deptCollectFirst['УПП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['УПП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УПП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УПП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['УПП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УПП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УПП'], 'total_refund_sum'))
        ];
        //ДП
        $Mdp = [
            'ДП' => $deptCollectFirst['ДП'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДП'], 'total_refund_sum'))
        ];
        //Филиалы
        $nur = [
            'Нур-Султан' =>$deptCollectFirst['Нур-Султан'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Нур-Султан'], 'total_refund_sum'))
        ];
        $aktobe = [
            'Актобе' =>$deptCollectFirst['Актобе'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Актобе'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Актобе'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Актобе'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Актобе'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Актобе'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Актобе'], 'total_refund_sum'))
        ];
        $shymkent = [
            'Шымкент' =>$deptCollectFirst['Шымкент'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Шымкент'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Шымкент'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Шымкент'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Шымкент'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Шымкент'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Шымкент'], 'total_refund_sum'))
        ];
        $koksh = [
            'Кокшетау' =>$deptCollectFirst['Кокшетау'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Кокшетау'], 'total_refund_sum'))
        ];
        $semei = [
            'Семей' =>$deptCollectFirst['Семей'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Семей'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Семей'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Семей'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Семей'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Семей'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Семей'], 'total_refund_sum'))
        ];
        $atyrauObl = [
            'Атырауская облась' =>$deptCollectFirst['Атырауская облась'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Атырауская облась'], 'total_refund_sum'))
        ];
        $aktobeObl = [
            'Актюбинская область' =>$deptCollectFirst['Актюбинская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Актюбинская область'], 'total_refund_sum'))
        ];
        $karagandaObl = [
            'Карагандинская область' =>$deptCollectFirst['Карагандинская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Карагандинская область'], 'total_refund_sum'))
        ];
        $kostanaiObl = [
            'Костанайская область' =>$deptCollectFirst['Костанайская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Костанайская область'], 'total_refund_sum'))
        ];
        $kyzylObl = [
            'Кызылординская область' =>$deptCollectFirst['Кызылординская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Кызылординская область'], 'total_refund_sum'))
        ];
        $mangystObl = [
            'Мангыстауская область' =>$deptCollectFirst['Мангыстауская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Мангыстауская область'], 'total_refund_sum'))
        ];
        $pavlObl = [
            'Павлодарская область' =>$deptCollectFirst['Павлодарская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Павлодарская область'], 'total_refund_sum'))
        ];
        $jambylObl = [
            'Жамбылская область' =>$deptCollectFirst['Жамбылская область'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Жамбылская область'], 'total_refund_sum'))
        ];
        $sko = [
            'СКО' =>$deptCollectFirst['СКО'],
            'feesplan' => array_sum(array_column($deptCollectFirst['СКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['СКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['СКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['СКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['СКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['СКО'], 'total_refund_sum'))
        ];
        $vko = [
            'ВКО'=>$deptCollectFirst['ВКО'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ВКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ВКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ВКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ВКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ВКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ВКО'], 'total_refund_sum'))
        ];
        //Купиполис
        $sait = [
            'kupipolis' => $deptCollectFirst['kupipolis'],
            'feesplan' => array_sum(array_column($deptCollectFirst['kupipolis'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['kupipolis'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['kupipolis'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['kupipolis'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['kupipolis'], 'total_refund_sum'))
        ];
        $sdz = [
            'СДЗ' => $deptCollectFirst['СДЗ'],
            'feesplan' => array_sum(array_column($deptCollectFirst['СДЗ'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['СДЗ'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['СДЗ'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['СДЗ'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['СДЗ'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['СДЗ'], 'total_refund_sum'))
        ];
        //Отдел страхования
        $os6 =[
            'Отделение страхования 6' => $deptCollectFirst['Отделение страхования 6'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 6'], 'total_refund_sum'))
        ];
        $os1 =[
            'Отделение страхования 1' => $deptCollectFirst['Отделение страхования 1'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 1'], 'total_refund_sum'))
        ];
        $os3 =[
            'Отделение страхования 3' => $deptCollectFirst['Отделение страхования 3'],
            'feesplan' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['Отделение страхования 3'], 'total_refund_sum'))
        ];
        //ДСВ
        $dsv_u = [
            'ДСВ' => $deptCollectFirst['ДСВ'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДСВ'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДСВ'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДСВ'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДСВ'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДСВ'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДСВ'], 'total_refund_sum'))
        ];
        //ДМС
        $dms_u = [
            'ДМС' => $deptCollectFirst['ДМС'],
            'feesplan' => array_sum(array_column($deptCollectFirst['ДМС'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['ДМС'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['ДМС'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectFirst['ДМС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['ДМС'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['ДМС'], 'total_refund_sum'))
        ];

        //second_date
        //ДКС
        $SD_Mdks = [
            'Менеджер ДКС' => $deptCollectSecond['ДКС'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДКС'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДКС'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДКС'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДКС'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДКС'], 'total_refund_sum'))
        ];
        $SD_uks1 = [
            'УКС1' => $deptCollectSecond['УКС1'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УКС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УКС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УКС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДКС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УКС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УКС1'], 'total_refund_sum'))
        ];
        $SD_uks2 = [
            'УКС2' => $deptCollectSecond['УКС2'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УКС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УКС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УКС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УКС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УКС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УКС2'], 'total_refund_sum'))
        ];
        $SD_uks3 = [
            'УКС3' => $deptCollectSecond['УКС3'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УКС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УКС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УКС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УКС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УКС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УКС3'], 'total_refund_sum'))
        ];
        $SD_uks4 = [
            'УКС4' => $deptCollectSecond['УКС4'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УКС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УКС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УКС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УКС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УКС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УКС4'], 'total_refund_sum'))
        ];
        $SD_ukr = [
            'УКР' => $deptCollectSecond['УКР'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УКР'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УКР'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УКР'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УКР'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УКР'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УКР'], 'total_refund_sum'))
        ];
        //ДСП
        $SD_Mdsp = [
            'Менеджер ДСП' => $deptCollectSecond['ДСП'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДСП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДСП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДСП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДСП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДСП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДСП'], 'total_refund_sum'))
        ];
        $SD_almaty = [
            'г.Алматы' => $deptCollectSecond['г.Алматы'],
            'feesplan' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['г.Алматы'], 'total_refund_sum'))
        ];
        $SD_uap = [
            'УАП' => $deptCollectSecond['УАП'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УАП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УАП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УАП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УАП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УАП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УАП'], 'total_refund_sum'))
        ];
        $SD_us1 = [
            'УС1' => $deptCollectSecond['УС1'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС1'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС1'], 'total_refund_sum'))
        ];
        $SD_us2 = [
            'УС2' => $deptCollectSecond['УС2'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС2'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС2'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС2'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС2'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС2'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС2'], 'total_refund_sum'))
        ];
        $SD_us3 = [
            'УС3' => $deptCollectSecond['УС3'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС3'], 'total_refund_sum'))
        ];
        $SD_us4 = [
            'УС4' => $deptCollectSecond['УС4'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС4'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС4'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС4'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС4'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС4'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС4'], 'total_refund_sum'))
        ];
        $SD_us5 = [
            'УС5' => $deptCollectSecond['УС5'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС5'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС5'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС5'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС5'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС5'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС5'], 'total_refund_sum'))
        ];
        $SD_us6 = [
            'УС6' => $deptCollectSecond['УС6'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС6'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС6'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС6'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС6'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС6'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС6'], 'total_refund_sum'))
        ];
        $SD_us7 = [
            'УС7' => $deptCollectSecond['УС7'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УС7'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УС7'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УС7'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УС7'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УС7'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УС7'], 'total_refund_sum'))
        ];
        //ДРПО
        $SD_Mdrpo = [
            'Менеджер ДРПО' => $deptCollectSecond['ДРПО'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДРПО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДРПО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДРПО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДРПО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДРПО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДРПО'], 'total_refund_sum'))
        ];
        $SD_upp = [
            'УПП' => $deptCollectSecond['УПП'],
            'feesplan' => array_sum(array_column($deptCollectSecond['УПП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['УПП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['УПП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['УПП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['УПП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['УПП'], 'total_refund_sum'))
        ];
        //ДП
        $SD_Mdp = [
            'ДП' => $deptCollectSecond['ДП'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДП'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДП'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДП'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДП'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДП'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДП'], 'total_refund_sum'))
        ];
        //Филиалы
        $SD_nur = [
            'Нур-Султан' =>$deptCollectSecond['Нур-Султан'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Нур-Султан'], 'total_refund_sum'))
        ];
        $SD_aktobe = [
            'Актобе' =>$deptCollectSecond['Актобе'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Актобе'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Актобе'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Актобе'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Актобе'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Актобе'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Актобе'], 'total_refund_sum'))
        ];
        $SD_shymkent = [
            'Шымкент' =>$deptCollectSecond['Шымкент'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Шымкент'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Шымкент'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Шымкент'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Шымкент'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Шымкент'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Шымкент'], 'total_refund_sum'))
        ];
        $SD_koksh = [
            'Кокшетау' =>$deptCollectSecond['Кокшетау'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Кокшетау'], 'total_refund_sum'))
        ];
        $SD_semei = [
            'Семей' =>$deptCollectSecond['Семей'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Семей'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Семей'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Семей'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Семей'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Семей'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Семей'], 'total_refund_sum'))
        ];
        $SD_atyrauObl = [
            'Атырауская облась' =>$deptCollectSecond['Атырауская облась'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Атырауская облась'], 'total_refund_sum'))
        ];
        $SD_aktobeObl = [
            'Актюбинская область' =>$deptCollectSecond['Актюбинская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Актюбинская область'], 'total_refund_sum'))
        ];
        $SD_karagandaObl = [
            'Карагандинская область' =>$deptCollectSecond['Карагандинская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Карагандинская область'], 'total_refund_sum'))
        ];
        $SD_kostanaiObl = [
            'Костанайская область' =>$deptCollectSecond['Костанайская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Костанайская область'], 'total_refund_sum'))
        ];
        $SD_kyzylObl = [
            'Кызылординская область' =>$deptCollectSecond['Кызылординская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Кызылординская область'], 'total_refund_sum'))
        ];
        $SD_mangystObl = [
            'Мангыстауская область' =>$deptCollectSecond['Мангыстауская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Мангыстауская область'], 'total_refund_sum'))
        ];
        $SD_pavlObl = [
            'Павлодарская область' =>$deptCollectSecond['Павлодарская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Павлодарская область'], 'total_refund_sum'))
        ];
        $SD_jambylObl = [
            'Жамбылская область' =>$deptCollectSecond['Жамбылская область'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Жамбылская область'], 'total_refund_sum'))
        ];
        $SD_sko = [
            'СКО' =>$deptCollectSecond['СКО'],
            'feesplan' => array_sum(array_column($deptCollectSecond['СКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['СКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['СКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['СКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['СКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['СКО'], 'total_refund_sum'))
        ];
        $SD_vko = [
            'ВКО'=>$deptCollectSecond['ВКО'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ВКО'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ВКО'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ВКО'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ВКО'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ВКО'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ВКО'], 'total_refund_sum'))
        ];
        //Купиполис
        $SD_sait = [
            'kupipolis' => $deptCollectSecond['kupipolis'],
            'feesplan' => array_sum(array_column($deptCollectSecond['kupipolis'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['kupipolis'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['kupipolis'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['kupipolis'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['kupipolis'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['kupipolis'], 'total_refund_sum'))
        ];
        $SD_sdz = [
            'СДЗ' => $deptCollectSecond['СДЗ'],
            'feesplan' => array_sum(array_column($deptCollectSecond['СДЗ'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['СДЗ'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['СДЗ'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['СДЗ'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['СДЗ'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['СДЗ'], 'total_refund_sum'))
        ];
        //Отдел страхования
        $SD_os6 =[
            'Отделение страхования 6' => $deptCollectSecond['Отделение страхования 6'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 6'], 'total_refund_sum'))
        ];
        $SD_os1 =[
            'Отделение страхования 1' => $deptCollectSecond['Отделение страхования 1'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 1'], 'total_refund_sum'))
        ];
        $SD_os3 =[
            'Отделение страхования 3' => $deptCollectSecond['Отделение страхования 3'],
            'feesplan' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['Отделение страхования 3'], 'total_refund_sum'))
        ];
        //ДСВ
        $SD_dsv_u = [
            'ДСВ' => $deptCollectSecond['ДСВ'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДСВ'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДСВ'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДСВ'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДСВ'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДСВ'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДСВ'], 'total_refund_sum'))
        ];
        //ДМС
        $SD_dms_u = [
            'ДМС' => $deptCollectSecond['ДМС'],
            'feesplan' => array_sum(array_column($deptCollectSecond['ДМС'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectSecond['ДМС'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectSecond['ДМС'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($deptCollectSecond['ДМС'], 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectSecond['ДМС'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectSecond['ДМС'], 'total_refund_sum'))
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
        $dksSum = [
            'feesplan' => array_sum(array_column($dks, 'feesplan')),
            'brutto_prem' => array_sum(array_column($dks, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($dks, 'comission_and_rating')),
            'dsd' => array_sum(array_column($dks, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($dks, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($dks, 'total_refund_sum')),
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
        $dspSum = [
            'feesplan' => array_sum(array_column($dsp, 'feesplan')),
            'brutto_prem' => array_sum(array_column($dsp, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($dsp, 'comission_and_rating')),
            'dsd' => array_sum(array_column($dsp, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($dsp, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($dsp, 'total_refund_sum')),
        ];
        $drpo = [
            'Менеджер ДРПО' => $Mdrpo,
            'УПП' => $upp,
        ];
        $drpoSum = [
            'feesplan' => array_sum(array_column($drpo, 'feesplan')),
            'brutto_prem' => array_sum(array_column($drpo, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($drpo, 'comission_and_rating')),
            'dsd' => array_sum(array_column($drpo, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($drpo, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($drpo, 'total_refund_sum')),
        ];
        $dp = [
            'ДП' => $Mdp
        ];
        $dpSum = [
            'feesplan' => array_sum(array_column($dp, 'feesplan')),
            'brutto_prem' => array_sum(array_column($dp, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($dp, 'comission_and_rating')),
            'dsd' => array_sum(array_column($dp, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($dp, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($dp, 'total_refund_sum')),
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
        $filialsSum = [
            'feesplan' => array_sum(array_column($filials, 'feesplan')),
            'brutto_prem' => array_sum(array_column($filials, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($filials, 'comission_and_rating')),
            'dsd' => array_sum(array_column($filials, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($filials, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($filials, 'total_refund_sum')),
        ];
        $kupipolis = [
            'kupipolis' => $sait,
            'СДЗ'=> $sdz,
        ];
        $kupipolisSum = [
            'feesplan' => array_sum(array_column($kupipolis, 'feesplan')),
            'brutto_prem' => array_sum(array_column($kupipolis, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($kupipolis, 'comission_and_rating')),
            'dsd' => array_sum(array_column($kupipolis, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($kupipolis, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($kupipolis, 'total_refund_sum')),
        ];
        $os = [
            'Отделение страхования 6' =>$os6,
            'Отделение страхования 1' =>$os1,
            'Отделение страхования 3' =>$os3,
        ];
        $osSum = [
            'feesplan' => array_sum(array_column($os, 'feesplan')),
            'brutto_prem' => array_sum(array_column($os, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($os, 'comission_and_rating')),
            'dsd' => array_sum(array_column($os, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($os, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($os, 'total_refund_sum')),
        ];
        $dsv = [
            'ДСВ' =>$dsv_u
        ];
        $dsvSum = [
            'feesplan' => array_sum(array_column($dsv, 'feesplan')),
            'brutto_prem' => array_sum(array_column($dsv, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($dsv, 'comission_and_rating')),
            'dsd' => array_sum(array_column($dsv, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($dsv, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($dsv, 'total_refund_sum')),
        ];
        $dms = [
            'ДМС' =>$dms_u
        ];
        $dmsSum = [
            'feesplan' => array_sum(array_column($dms, 'feesplan')),
            'brutto_prem' => array_sum(array_column($dms, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($dms, 'comission_and_rating')),
            'dsd' => array_sum(array_column($dms, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($dms, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($dms, 'total_refund_sum')),
        ];

        $sd_dks = [
            'Менеджер ДКС' => $SD_Mdks,
            'УКС1' => $SD_uks1,
            'УКС2' => $SD_uks2,
            'УКС3' => $SD_uks3,
            'УКС4' => $SD_uks4,
            'УКР' => $SD_ukr,
        ];
        $sd_dksSum = [
            'feesplan' => array_sum(array_column($sd_dks, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_dks, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_dks, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_dks, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_dks, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_dks, 'total_refund_sum')),
        ];
        $sd_dsp = [
            'Менеджер ДСП' => $SD_Mdsp,
            'г.Алматы' => $SD_almaty,
            'УАП' => $SD_uap,
            'УС1' => $SD_us1,
            'УС2' => $SD_us2,
            'УС3' => $SD_us3,
            'УС4' => $SD_us4,
            'УС5' => $SD_us5,
            'УС6' => $SD_us6,
            'УС7' => $SD_us7,
        ];
        $sd_dspSum = [
            'feesplan' => array_sum(array_column($sd_dsp, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_dsp, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_dsp, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_dsp, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_dsp, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_dsp, 'total_refund_sum')),
        ];
        $sd_drpo = [
            'Менеджер ДРПО' => $SD_Mdrpo,
            'УПП' => $SD_upp,
        ];
        $sd_drpoSum = [
            'feesplan' => array_sum(array_column($sd_drpo, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_drpo, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_drpo, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_drpo, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_drpo, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_drpo, 'total_refund_sum')),
        ];
        $sd_dp = [
            'ДП' => $SD_Mdp
        ];
        $sd_dpSum = [
            'feesplan' => array_sum(array_column($sd_dp, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_dp, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_dp, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_dp, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_dp, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_dp, 'total_refund_sum')),
        ];
        $sd_filials = [
            'Нур-Султан' =>$SD_nur,
            'Актобе' =>$SD_aktobe,
            'Шымкент' =>$SD_shymkent,
            'Кокшетау' =>$SD_koksh,
            'Семей' =>$SD_semei,
            'Атырауская облась' =>$SD_atyrauObl,
            'Актюбинская область' =>$SD_aktobeObl,
            'Карагандинская область' =>$SD_karagandaObl,
            'Костанайская область' =>$SD_kostanaiObl,
            'Кызылординская область' =>$SD_kyzylObl,
            'Мангыстауская область' =>$SD_mangystObl,
            'Павлодарская область' =>$SD_pavlObl,
            'Жамбылская область' =>$SD_jambylObl,
            'СКО' =>$SD_sko,
            'ВКО'=>$SD_vko
        ];
        $sd_filialsSum = [
            'feesplan' => array_sum(array_column($sd_filials, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_filials, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_filials, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_filials, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_filials, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_filials, 'total_refund_sum')),
        ];
        $sd_kupipolis = [
            'kupipolis' => $SD_sait,
            'СДЗ'=> $SD_sdz,
        ];
        $sd_kupipolisSum = [
            'feesplan' => array_sum(array_column($sd_kupipolis, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_kupipolis, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_kupipolis, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_kupipolis, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_kupipolis, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_kupipolis, 'total_refund_sum')),
        ];
        $sd_os = [
            'Отделение страхования 6' =>$SD_os6,
            'Отделение страхования 1' =>$SD_os1,
            'Отделение страхования 3' =>$SD_os3,
        ];
        $sd_osSum = [
            'feesplan' => array_sum(array_column($sd_os, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_os, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_os, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_os, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_os, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_os, 'total_refund_sum')),
        ];
        $sd_dsv = [
            'ДСВ' =>$SD_dsv_u
        ];
        $sd_dsvSum = [
            'feesplan' => array_sum(array_column($sd_dsv, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_dsv, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_dsv, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_dsv, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_dsv, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_dsv, 'total_refund_sum')),
        ];
        $sd_dms = [
            'ДМС' =>$SD_dms_u
        ];
        $sd_dmsSum = [
            'feesplan' => array_sum(array_column($sd_dms, 'feesplan')),
            'brutto_prem' => array_sum(array_column($sd_dms, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($sd_dms, 'comission_and_rating')),
            'dsd' => array_sum(array_column($sd_dms, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($sd_dms, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($sd_dms, 'total_refund_sum')),
        ];


        return response()->json([
            'success' => true,
            'data' => [
                'collectsSum' => [
                    'ДКС'=> $dksSum,
                    'ДСП' => $dspSum,
                    'ДРПО' => $drpoSum,
                    'ДП' => $dpSum,
                    'Филиалы' => $filialsSum,
                    'kupipolis' => $kupipolisSum,
                    'Отдел страхования' => $osSum,
                    'ДСВ' => $dsvSum,
                    'ДМС' => $dmsSum
                ],
                'collectsSum2' => [
                    'ДКС'=> $sd_dksSum,
                    'ДСП' => $sd_dspSum,
                    'ДРПО' => $sd_drpoSum,
                    'ДП' => $sd_dpSum,
                    'Филиалы' => $sd_filialsSum,
                    'kupipolis' => $sd_kupipolisSum,
                    'Отдел страхования' => $sd_osSum,
                    'ДСВ' => $sd_dsvSum,
                    'ДМС' => $sd_dmsSum
                ],
                'collects1' => [
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
                'collects2' => [
                    'ДКС'=> $sd_dks,
                    'ДСП' => $sd_dsp,
                    'ДРПО' => $sd_drpo,
                    'ДП' => $sd_dp,
                    'Филиалы' => $sd_filials,
                    'kupipolis' => $sd_kupipolis,
                    'Отдел страхования' => $sd_os,
                    'ДСВ' => $sd_dsv,
                    'ДМС' => $sd_dms
                ],
                'label_first' => $label_first,
                'label_second' => $label_second,
            ]
        ]);

    }
}
