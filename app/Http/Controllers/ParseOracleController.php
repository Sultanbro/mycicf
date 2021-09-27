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

        //Менеджеры сделал уникальные ключи
        $managerDKS = array_combine(array_column($deptCollectFirst['ДКС'],'agrempl'),$deptCollectFirst['ДКС']);
        $managerUKS1 = array_combine(array_column($deptCollectFirst['УКС1'],'agrempl'),$deptCollectFirst['УКС1']);
        $managerUKS2 = array_combine(array_column($deptCollectFirst['УКС2'],'agrempl'),$deptCollectFirst['УКС2']);
        $managerUKS3 = array_combine(array_column($deptCollectFirst['УКС3'],'agrempl'),$deptCollectFirst['УКС3']);
        $managerUKS4 = array_combine(array_column($deptCollectFirst['УКС4'],'agrempl'),$deptCollectFirst['УКС4']);
        $managerUKR = array_combine(array_column($deptCollectFirst['УКР'],'agrempl'),$deptCollectFirst['УКР']);
        //Управление
        $Mdks = [
            'Менеджер ДКС' => $managerDKS,
            'feesplan' => array_sum(array_column($managerDKS, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDKS, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDKS, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDKS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDKS, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDKS, 'total_refund_sum'))
        ];
        $uks1 = [
            'УКС1' => $managerUKS1,
            'feesplan' => array_sum(array_column($deptCollectFirst['УКС1'], 'feesplan')),
            'brutto_prem' => array_sum(array_column($deptCollectFirst['УКС1'], 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($deptCollectFirst['УКС1'], 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDKS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($deptCollectFirst['УКС1'], 'total_refund_sum'))
        ];
        $uks2 = [
            'УКС2' => $managerUKS2,
            'feesplan' => array_sum(array_column($managerUKS2, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUKS2, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUKS2, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUKS2, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUKS2, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUKS2, 'total_refund_sum'))
        ];
        $uks3 = [
            'УКС3' => $managerUKS3,
            'feesplan' => array_sum(array_column($managerUKS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUKS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUKS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUKS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUKS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUKS3, 'total_refund_sum'))
        ];
        $uks4 = [
            'УКС4' => $managerUKS4,
            'feesplan' => array_sum(array_column($managerUKS4, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUKS4, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUKS4, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUKS4, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUKS4, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUKS4, 'total_refund_sum'))
        ];
        $ukr = [
            'УКР' => $managerUKR,
            'feesplan' => array_sum(array_column($managerUKR, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUKR, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUKR, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUKR, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUKR, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUKR, 'total_refund_sum'))
        ];

        $managerDSP = array_combine(array_column($deptCollectFirst['ДСП'],'agrempl'),$deptCollectFirst['ДСП']);
        $managerAlmaty = array_combine(array_column($deptCollectFirst['г.Алматы'],'agrempl'),$deptCollectFirst['г.Алматы']);
        $managerUAP = array_combine(array_column($deptCollectFirst['УАП'],'agrempl'),$deptCollectFirst['УАП']);
        $managerUS1 = array_combine(array_column($deptCollectFirst['УС1'],'agrempl'),$deptCollectFirst['УС1']);
        $managerUS2 = array_combine(array_column($deptCollectFirst['УС2'],'agrempl'),$deptCollectFirst['УС2']);
        $managerUS3 = array_combine(array_column($deptCollectFirst['УС3'],'agrempl'),$deptCollectFirst['УС3']);
        $managerUS4 = array_combine(array_column($deptCollectFirst['УС4'],'agrempl'),$deptCollectFirst['УС4']);
        $managerUS5 = array_combine(array_column($deptCollectFirst['УС5'],'agrempl'),$deptCollectFirst['УС5']);
        $managerUS6 = array_combine(array_column($deptCollectFirst['УС6'],'agrempl'),$deptCollectFirst['УС6']);
        $managerUS7 = array_combine(array_column($deptCollectFirst['УС7'],'agrempl'),$deptCollectFirst['УС7']);
        //ДСП
        $Mdsp = [
            'Менеджер ДСП' => $managerDSP,
            'feesplan' => array_sum(array_column($managerDSP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDSP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDSP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDSP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDSP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDSP, 'total_refund_sum'))
        ];
        $almaty = [
            'г.Алматы' => $managerAlmaty,
            'feesplan' => array_sum(array_column($managerAlmaty, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerAlmaty, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerAlmaty, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerAlmaty, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerAlmaty, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerAlmaty, 'total_refund_sum'))
        ];
        $uap = [
            'УАП' => $managerUAP,
            'feesplan' => array_sum(array_column($managerUAP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUAP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUAP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUAP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUAP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUAP, 'total_refund_sum'))
        ];
        $us1 = [
            'УС1' => $managerUS1,
            'feesplan' => array_sum(array_column($managerUS1, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS1, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS1, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS1, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS1, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS1, 'total_refund_sum'))
        ];
        $us2 = [
            'УС2' => $managerUS2,
            'feesplan' => array_sum(array_column($managerUS2, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS2, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS2, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS2, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS2, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS2, 'total_refund_sum'))
        ];
        $us3 = [
            'УС3' => $managerUS3,
            'feesplan' => array_sum(array_column($managerUS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS3, 'total_refund_sum'))
        ];
        $us4 = [
            'УС4' => $managerUS4,
            'feesplan' => array_sum(array_column($managerUS4, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS4, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS4, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS4, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS4, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS4, 'total_refund_sum'))
        ];
        $us5 = [
            'УС5' => $managerUS5,
            'feesplan' => array_sum(array_column($managerUS5, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS5, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS5, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS5, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS5, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS5, 'total_refund_sum'))
        ];
        $us6 = [
            'УС6' => $managerUS6,
            'feesplan' => array_sum(array_column($managerUS6, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS6, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS6, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS6, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS6, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS6, 'total_refund_sum'))
        ];
        $us7 = [
            'УС7' => $managerUS7,
            'feesplan' => array_sum(array_column($managerUS7, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUS7, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUS7, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUS7, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUS7, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUS7, 'total_refund_sum'))
        ];

        $managerDRPO = array_combine(array_column($deptCollectFirst['ДРПО'],'agrempl'),$deptCollectFirst['ДРПО']);
        $managerUPP = array_combine(array_column($deptCollectFirst['УПП'],'agrempl'),$deptCollectFirst['УПП']);
        //ДРПО
        $Mdrpo = [
            'Менеджер ДРПО' => $managerDRPO,
            'feesplan' => array_sum(array_column($managerDRPO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDRPO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDRPO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDRPO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDRPO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDRPO, 'total_refund_sum'))
        ];
        $upp = [
            'УПП' => $managerUPP,
            'feesplan' => array_sum(array_column($managerUPP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerUPP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerUPP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerUPP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerUPP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerUPP, 'total_refund_sum'))
        ];

        $managerDP = array_combine(array_column($deptCollectFirst['ДП'],'agrempl'),$deptCollectFirst['ДП']);
        //ДП
        $Mdp = [
            'ДП' => $managerDP,
            'feesplan' => array_sum(array_column($managerDP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDP, 'total_refund_sum'))
        ];

        $managerNurSultan = array_combine(array_column($deptCollectFirst['Нур-Султан'],'agrempl'),$deptCollectFirst['Нур-Султан']);
        $managerAktobe = array_combine(array_column($deptCollectFirst['Актобе'],'agrempl'),$deptCollectFirst['Актобе']);
        $managerShymkent = array_combine(array_column($deptCollectFirst['Шымкент'],'agrempl'),$deptCollectFirst['Шымкент']);
        $managerKokshetay = array_combine(array_column($deptCollectFirst['Кокшетау'],'agrempl'),$deptCollectFirst['Кокшетау']);
        $managerSemei = array_combine(array_column($deptCollectFirst['Семей'],'agrempl'),$deptCollectFirst['Семей']);
        $managerAtyrauObl =
            array_combine(array_column($deptCollectFirst['Атырауская облась'],'agrempl'),$deptCollectFirst['Атырауская облась']);
        $managerAktobeObl =
            array_combine(array_column($deptCollectFirst['Актюбинская область'],'agrempl'),$deptCollectFirst['Актюбинская область']);
        $managerKaragndaObl =
            array_combine(array_column($deptCollectFirst['Карагандинская область'],'agrempl'),$deptCollectFirst['Карагандинская область']);
        $managerKostanObl =
            array_combine(array_column($deptCollectFirst['Костанайская область'],'agrempl'),$deptCollectFirst['Костанайская область']);
        $managerKyzylObl =
            array_combine(array_column($deptCollectFirst['Кызылординская область'],'agrempl'),$deptCollectFirst['Кызылординская область']);
        $managerMangysObl =
            array_combine(array_column($deptCollectFirst['Мангыстауская область'],'agrempl'),$deptCollectFirst['Мангыстауская область']);
        $managerPavloObl =
            array_combine(array_column($deptCollectFirst['Павлодарская область'],'agrempl'),$deptCollectFirst['Павлодарская область']);
        $managerJambylObl =
            array_combine(array_column($deptCollectFirst['Жамбылская область'],'agrempl'),$deptCollectFirst['Жамбылская область']);
        $managerSKO = array_combine(array_column($deptCollectFirst['СКО'],'agrempl'),$deptCollectFirst['СКО']);
        $managerVKO = array_combine(array_column($deptCollectFirst['ВКО'],'agrempl'),$deptCollectFirst['ВКО']);
        //Филиалы
        $nur = [
            'Нур-Султан' =>$managerNurSultan,
            'feesplan' => array_sum(array_column($managerNurSultan, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerNurSultan, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerNurSultan, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerNurSultan, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerNurSultan, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerNurSultan, 'total_refund_sum'))
        ];
        $aktobe = [
            'Актобе' =>$managerAktobe,
            'feesplan' => array_sum(array_column($managerAktobe, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerAktobe, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerAktobe, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerAktobe, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerAktobe, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerAktobe, 'total_refund_sum'))
        ];
        $shymkent = [
            'Шымкент' =>$managerShymkent,
            'feesplan' => array_sum(array_column($managerShymkent, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerShymkent, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerShymkent, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerShymkent, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerShymkent, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerShymkent, 'total_refund_sum'))
        ];
        $koksh = [
            'Кокшетау' =>$managerKokshetay,
            'feesplan' => array_sum(array_column($managerKokshetay, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerKokshetay, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerKokshetay, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerKokshetay, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerKokshetay, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerKokshetay, 'total_refund_sum'))
        ];
        $semei = [
            'Семей' =>$managerSemei,
            'feesplan' => array_sum(array_column($managerSemei, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerSemei, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerSemei, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerSemei, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerSemei, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerSemei, 'total_refund_sum'))
        ];
        $atyrauObl = [
            'Атырауская облась' =>$managerAtyrauObl,
            'feesplan' => array_sum(array_column($managerAtyrauObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerAtyrauObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerAtyrauObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerAtyrauObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerAtyrauObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerAtyrauObl, 'total_refund_sum'))
        ];
        $aktobeObl = [
            'Актюбинская область' =>$managerAktobeObl,
            'feesplan' => array_sum(array_column($managerAktobeObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerAktobeObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerAktobeObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerAktobeObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerAktobeObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerAktobeObl, 'total_refund_sum'))
        ];
        $karagandaObl = [
            'Карагандинская область' =>$managerKaragndaObl,
            'feesplan' => array_sum(array_column($managerKaragndaObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerKaragndaObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerKaragndaObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerKaragndaObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerKaragndaObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerKaragndaObl, 'total_refund_sum'))
        ];
        $kostanaiObl = [
            'Костанайская область' =>$managerKostanObl,
            'feesplan' => array_sum(array_column($managerKostanObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerKostanObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerKostanObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerKostanObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerKostanObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerKostanObl, 'total_refund_sum'))
        ];
        $kyzylObl = [
            'Кызылординская область' =>$managerKyzylObl,
            'feesplan' => array_sum(array_column($managerKyzylObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerKyzylObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerKyzylObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerKyzylObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerKyzylObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerKyzylObl, 'total_refund_sum'))
        ];
        $mangystObl = [
            'Мангыстауская область' =>$managerMangysObl,
            'feesplan' => array_sum(array_column($managerMangysObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerMangysObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerMangysObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerMangysObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerMangysObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerMangysObl, 'total_refund_sum'))
        ];
        $pavlObl = [
            'Павлодарская область' =>$managerPavloObl,
            'feesplan' => array_sum(array_column($managerPavloObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerPavloObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerPavloObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerPavloObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerPavloObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerPavloObl, 'total_refund_sum'))
        ];
        $jambylObl = [
            'Жамбылская область' =>$managerJambylObl,
            'feesplan' => array_sum(array_column($managerJambylObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerJambylObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerJambylObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerJambylObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerJambylObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerJambylObl, 'total_refund_sum'))
        ];
        $sko = [
            'СКО' =>$managerSKO,
            'feesplan' => array_sum(array_column($managerSKO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerSKO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerSKO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerSKO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerSKO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerSKO, 'total_refund_sum'))
        ];
        $vko = [
            'ВКО'=>$managerVKO,
            'feesplan' => array_sum(array_column($managerVKO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerVKO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerVKO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerVKO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerVKO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerVKO, 'total_refund_sum'))
        ];

        $managerSait = array_combine(array_column($deptCollectFirst['kupipolis'],'agrempl'),$deptCollectFirst['kupipolis']);
        $managerSDZ = array_combine(array_column($deptCollectFirst['СДЗ'],'agrempl'),$deptCollectFirst['СДЗ']);
        //Купиполис
        $sait = [
            'kupipolis' => $managerSait,
            'feesplan' => array_sum(array_column($managerSait, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerSait, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerSait, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerSait, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerSait, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerSait, 'total_refund_sum'))
        ];
        $sdz = [
            'СДЗ' => $managerSDZ,
            'feesplan' => array_sum(array_column($managerSDZ, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerSDZ, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerSDZ, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerSDZ, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerSDZ, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerSDZ, 'total_refund_sum'))
        ];

        $managerOS6 = array_combine(
            array_column($deptCollectFirst['Отделение страхования 6'],'agrempl'),$deptCollectFirst['Отделение страхования 6']);
        $managerOS1 = array_combine(
            array_column($deptCollectFirst['Отделение страхования 1'],'agrempl'),$deptCollectFirst['Отделение страхования 1']);
        $managerOS3 = array_combine(
            array_column($deptCollectFirst['Отделение страхования 3'],'agrempl'),$deptCollectFirst['Отделение страхования 3']);
        //Отдел страхования
        $os6 =[
            'Отделение страхования 6' => $managerOS6,
            'feesplan' => array_sum(array_column($managerOS6, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerOS6, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerOS6, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerOS6, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerOS6, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerOS6, 'total_refund_sum'))
        ];
        $os1 =[
            'Отделение страхования 1' => $managerOS1,
            'feesplan' => array_sum(array_column($managerOS1, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerOS1, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerOS1, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerOS1, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerOS1, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerOS1, 'total_refund_sum'))
        ];
        $os3 =[
            'Отделение страхования 3' => $managerOS3,
            'feesplan' => array_sum(array_column($managerOS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerOS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerOS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerOS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerOS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerOS3, 'total_refund_sum'))
        ];

        $managerDSV = array_combine(array_column($deptCollectFirst['ДСВ'],'agrempl'),$deptCollectFirst['ДСВ']);
        //ДСВ
        $dsv_u = [
            'ДСВ' => $managerDSV,
            'feesplan' => array_sum(array_column($managerDSV, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDSV, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDSV, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDSV, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDSV, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDSV, 'total_refund_sum'))
        ];

        $managerDMS = array_combine(array_column($deptCollectFirst['ДМС'],'agrempl'),$deptCollectFirst['ДМС']);
        //ДМС
        $dms_u = [
            'ДМС' => $managerDMS,
            'feesplan' => array_sum(array_column($managerDMS, 'feesplan')),
            'brutto_prem' => array_sum(array_column($managerDMS, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($managerDMS, 'comission_and_rating')),
            'dsd' => array_sum(array_column($managerDMS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($managerDMS, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($managerDMS, 'total_refund_sum'))
        ];


        //second_date
        $SD_managerDKS = array_combine(array_column($deptCollectSecond['ДКС'],'agrempl'),$deptCollectSecond['ДКС']);
        $SD_managerUKS1 = array_combine(array_column($deptCollectSecond['УКС1'],'agrempl'),$deptCollectSecond['УКС1']);
        $SD_managerUKS2 = array_combine(array_column($deptCollectSecond['УКС2'],'agrempl'),$deptCollectSecond['УКС2']);
        $SD_managerUKS3 = array_combine(array_column($deptCollectSecond['УКС3'],'agrempl'),$deptCollectSecond['УКС3']);
        $SD_managerUKS4 = array_combine(array_column($deptCollectSecond['УКС4'],'agrempl'),$deptCollectSecond['УКС4']);
        $SD_managerUKR = array_combine(array_column($deptCollectSecond['УКР'],'agrempl'),$deptCollectSecond['УКР']);
        //ДКС
        $SD_Mdks = [
            'Менеджер ДКС' => $SD_managerDKS,
            'feesplan' => array_sum(array_column($SD_managerDKS, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDKS, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDKS, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDKS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDKS, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDKS, 'total_refund_sum'))
        ];
        $SD_uks1 = [
            'УКС1' => $SD_managerUKS1,
            'feesplan' => array_sum(array_column($SD_managerUKS1, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUKS1, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUKS1, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDKS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUKS1, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUKS1, 'total_refund_sum'))
        ];
        $SD_uks2 = [
            'УКС2' => $SD_managerUKS2,
            'feesplan' => array_sum(array_column($SD_managerUKS2, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUKS2, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUKS2, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUKS2, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUKS2, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUKS2, 'total_refund_sum'))
        ];
        $SD_uks3 = [
            'УКС3' => $SD_managerUKS3,
            'feesplan' => array_sum(array_column($SD_managerUKS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUKS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUKS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUKS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUKS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUKS3, 'total_refund_sum'))
        ];
        $SD_uks4 = [
            'УКС4' => $SD_managerUKS4,
            'feesplan' => array_sum(array_column($SD_managerUKS4, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUKS4, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUKS4, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUKS4, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUKS4, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUKS4, 'total_refund_sum'))
        ];
        $SD_ukr = [
            'УКР' => $SD_managerUKR,
            'feesplan' => array_sum(array_column($SD_managerUKR, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUKR, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUKR, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUKR, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUKR, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUKR, 'total_refund_sum'))
        ];

        $SD_managerDSP = array_combine(array_column($deptCollectSecond['ДСП'],'agrempl'),$deptCollectSecond['ДСП']);
        $SD_managerAlmaty = array_combine(array_column($deptCollectSecond['г.Алматы'],'agrempl'),$deptCollectSecond['г.Алматы']);
        $SD_managerUAP = array_combine(array_column($deptCollectSecond['УАП'],'agrempl'),$deptCollectSecond['УАП']);
        $SD_managerUS1 = array_combine(array_column($deptCollectSecond['УС1'],'agrempl'),$deptCollectSecond['УС1']);
        $SD_managerUS2 = array_combine(array_column($deptCollectSecond['УС2'],'agrempl'),$deptCollectSecond['УС2']);
        $SD_managerUS3 = array_combine(array_column($deptCollectSecond['УС3'],'agrempl'),$deptCollectSecond['УС3']);
        $SD_managerUS4 = array_combine(array_column($deptCollectSecond['УС4'],'agrempl'),$deptCollectSecond['УС4']);
        $SD_managerUS5 = array_combine(array_column($deptCollectSecond['УС5'],'agrempl'),$deptCollectSecond['УС5']);
        $SD_managerUS6 = array_combine(array_column($deptCollectSecond['УС6'],'agrempl'),$deptCollectSecond['УС6']);
        $SD_managerUS7 = array_combine(array_column($deptCollectSecond['УС7'],'agrempl'),$deptCollectSecond['УС7']);
        //ДСП
        $SD_Mdsp = [
            'Менеджер ДСП' => $SD_managerDSP,
            'feesplan' => array_sum(array_column($SD_managerDSP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDSP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDSP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDSP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDSP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDSP, 'total_refund_sum'))
        ];
        $SD_almaty = [
            'г.Алматы' => $SD_managerAlmaty,
            'feesplan' => array_sum(array_column($SD_managerAlmaty, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerAlmaty, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerAlmaty, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerAlmaty, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerAlmaty, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerAlmaty, 'total_refund_sum'))
        ];
        $SD_uap = [
            'УАП' => $SD_managerUAP,
            'feesplan' => array_sum(array_column($SD_managerUAP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUAP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUAP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUAP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUAP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUAP, 'total_refund_sum'))
        ];
        $SD_us1 = [
            'УС1' => $SD_managerUS1,
            'feesplan' => array_sum(array_column($SD_managerUS1, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS1, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS1, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS1, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS1, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS1, 'total_refund_sum'))
        ];
        $SD_us2 = [
            'УС2' => $SD_managerUS2,
            'feesplan' => array_sum(array_column($SD_managerUS2, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS2, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS2, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS2, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS2, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS2, 'total_refund_sum'))
        ];
        $SD_us3 = [
            'УС3' => $SD_managerUS3,
            'feesplan' => array_sum(array_column($SD_managerUS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS3, 'total_refund_sum'))
        ];
        $SD_us4 = [
            'УС4' => $SD_managerUS4,
            'feesplan' => array_sum(array_column($SD_managerUS4, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS4, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS4, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS4, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS4, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS4, 'total_refund_sum'))
        ];
        $SD_us5 = [
            'УС5' => $SD_managerUS5,
            'feesplan' => array_sum(array_column($SD_managerUS5, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS5, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS5, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS5, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS5, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS5, 'total_refund_sum'))
        ];
        $SD_us6 = [
            'УС6' => $SD_managerUS6,
            'feesplan' => array_sum(array_column($SD_managerUS6, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS6, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS6, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS6, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS6, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS6, 'total_refund_sum'))
        ];
        $SD_us7 = [
            'УС7' => $SD_managerUS7,
            'feesplan' => array_sum(array_column($SD_managerUS7, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUS7, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUS7, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUS7, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUS7, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUS7, 'total_refund_sum'))
        ];

        $SD_managerDRPO = array_combine(array_column($deptCollectSecond['ДРПО'],'agrempl'),$deptCollectSecond['ДРПО']);
        $SD_managerUPP = array_combine(array_column($deptCollectSecond['УПП'],'agrempl'),$deptCollectSecond['УПП']);
        //ДРПО
        $SD_Mdrpo = [
            'Менеджер ДРПО' => $SD_managerDRPO,
            'feesplan' => array_sum(array_column($SD_managerDRPO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDRPO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDRPO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDRPO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDRPO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDRPO, 'total_refund_sum'))
        ];
        $SD_upp = [
            'УПП' => $SD_managerUPP,
            'feesplan' => array_sum(array_column($SD_managerUPP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerUPP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerUPP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerUPP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerUPP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerUPP, 'total_refund_sum'))
        ];

        $SD_managerDP = array_combine(array_column($deptCollectSecond['ДП'],'agrempl'),$deptCollectSecond['ДП']);
        //ДП
        $SD_Mdp = [
            'ДП' => $SD_managerDP,
            'feesplan' => array_sum(array_column($SD_managerDP, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDP, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDP, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDP, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDP, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDP, 'total_refund_sum'))
        ];

        $SD_managerNurSultan = array_combine(array_column($deptCollectSecond['Нур-Султан'],'agrempl'),$deptCollectSecond['Нур-Султан']);
        $SD_managerAktobe = array_combine(array_column($deptCollectSecond['Актобе'],'agrempl'),$deptCollectSecond['Актобе']);
        $SD_managerShymkent = array_combine(array_column($deptCollectSecond['Шымкент'],'agrempl'),$deptCollectSecond['Шымкент']);
        $SD_managerKokshetay = array_combine(array_column($deptCollectSecond['Кокшетау'],'agrempl'),$deptCollectSecond['Кокшетау']);
        $SD_managerSemei = array_combine(array_column($deptCollectSecond['Семей'],'agrempl'),$deptCollectSecond['Семей']);
        $SD_managerAtyrauObl =
            array_combine(array_column($deptCollectSecond['Атырауская облась'],'agrempl'),$deptCollectSecond['Атырауская облась']);
        $SD_managerAktobeObl =
            array_combine(array_column($deptCollectSecond['Актюбинская область'],'agrempl'),$deptCollectSecond['Актюбинская область']);
        $SD_managerKaragndaObl =
            array_combine(array_column($deptCollectSecond['Карагандинская область'],'agrempl'),$deptCollectSecond['Карагандинская область']);
        $SD_managerKostanObl =
            array_combine(array_column($deptCollectSecond['Костанайская область'],'agrempl'),$deptCollectSecond['Костанайская область']);
        $SD_managerKyzylObl =
            array_combine(array_column($deptCollectSecond['Кызылординская область'],'agrempl'),$deptCollectSecond['Кызылординская область']);
        $SD_managerMangysObl =
            array_combine(array_column($deptCollectSecond['Мангыстауская область'],'agrempl'),$deptCollectSecond['Мангыстауская область']);
        $SD_managerPavloObl =
            array_combine(array_column($deptCollectSecond['Павлодарская область'],'agrempl'),$deptCollectSecond['Павлодарская область']);
        $SD_managerJambylObl =
            array_combine(array_column($deptCollectSecond['Жамбылская область'],'agrempl'),$deptCollectSecond['Жамбылская область']);
        $SD_managerSKO = array_combine(array_column($deptCollectSecond['СКО'],'agrempl'),$deptCollectSecond['СКО']);
        $SD_managerVKO = array_combine(array_column($deptCollectSecond['ВКО'],'agrempl'),$deptCollectSecond['ВКО']);

        //Филиалы
        $SD_nur = [
            'Нур-Султан' =>$SD_managerNurSultan,
            'feesplan' => array_sum(array_column($SD_managerNurSultan, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerNurSultan, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerNurSultan, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerNurSultan, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerNurSultan, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerNurSultan, 'total_refund_sum'))
        ];
        $SD_aktobe = [
            'Актобе' =>$SD_managerAktobe,
            'feesplan' => array_sum(array_column($SD_managerAktobe, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerAktobe, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerAktobe, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerAktobe, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerAktobe, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerAktobe, 'total_refund_sum'))
        ];
        $SD_shymkent = [
            'Шымкент' =>$SD_managerShymkent,
            'feesplan' => array_sum(array_column($SD_managerShymkent, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerShymkent, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerShymkent, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerShymkent, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerShymkent, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerShymkent, 'total_refund_sum'))
        ];
        $SD_koksh = [
            'Кокшетау' =>$SD_managerKokshetay,
            'feesplan' => array_sum(array_column($SD_managerKokshetay, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerKokshetay, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerKokshetay, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerKokshetay, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerKokshetay, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerKokshetay, 'total_refund_sum'))
        ];
        $SD_semei = [
            'Семей' =>$SD_managerSemei,
            'feesplan' => array_sum(array_column($SD_managerSemei, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerSemei, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerSemei, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerSemei, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerSemei, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerSemei, 'total_refund_sum'))
        ];
        $SD_atyrauObl = [
            'Атырауская облась' =>$SD_managerAtyrauObl,
            'feesplan' => array_sum(array_column($SD_managerAtyrauObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerAtyrauObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerAtyrauObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerAtyrauObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerAtyrauObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerAtyrauObl, 'total_refund_sum'))
        ];
        $SD_aktobeObl = [
            'Актюбинская область' =>$SD_managerAktobeObl,
            'feesplan' => array_sum(array_column($SD_managerAktobeObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerAktobeObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerAktobeObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerAktobeObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerAktobeObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerAktobeObl, 'total_refund_sum'))
        ];
        $SD_karagandaObl = [
            'Карагандинская область' =>$SD_managerKaragndaObl,
            'feesplan' => array_sum(array_column($SD_managerKaragndaObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerKaragndaObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerKaragndaObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerKaragndaObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerKaragndaObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerKaragndaObl, 'total_refund_sum'))
        ];
        $SD_kostanaiObl = [
            'Костанайская область' =>$SD_managerKostanObl,
            'feesplan' => array_sum(array_column($SD_managerKostanObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerKostanObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerKostanObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerKostanObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerKostanObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerKostanObl, 'total_refund_sum'))
        ];
        $SD_kyzylObl = [
            'Кызылординская область' =>$SD_managerKyzylObl,
            'feesplan' => array_sum(array_column($SD_managerKyzylObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerKyzylObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerKyzylObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerKyzylObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerKyzylObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerKyzylObl, 'total_refund_sum'))
        ];
        $SD_mangystObl = [
            'Мангыстауская область' =>$SD_managerMangysObl,
            'feesplan' => array_sum(array_column($SD_managerMangysObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerMangysObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerMangysObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerMangysObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerMangysObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerMangysObl, 'total_refund_sum'))
        ];
        $SD_pavlObl = [
            'Павлодарская область' =>$SD_managerPavloObl,
            'feesplan' => array_sum(array_column($SD_managerPavloObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerPavloObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerPavloObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerPavloObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerPavloObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerPavloObl, 'total_refund_sum'))
        ];
        $SD_jambylObl = [
            'Жамбылская область' =>$SD_managerJambylObl,
            'feesplan' => array_sum(array_column($SD_managerJambylObl, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerJambylObl, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerJambylObl, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerJambylObl, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerJambylObl, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerJambylObl, 'total_refund_sum'))
        ];
        $SD_sko = [
            'СКО' =>$SD_managerSKO,
            'feesplan' => array_sum(array_column($SD_managerSKO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerSKO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerSKO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerSKO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerSKO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerSKO, 'total_refund_sum'))
        ];
        $SD_vko = [
            'ВКО'=>$SD_managerVKO,
            'feesplan' => array_sum(array_column($SD_managerVKO, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerVKO, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerVKO, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerVKO, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerVKO, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerVKO, 'total_refund_sum'))
        ];

        $SD_managerSait = array_combine(array_column($deptCollectSecond['kupipolis'],'agrempl'),$deptCollectSecond['kupipolis']);
        $SD_managerSDZ = array_combine(array_column($deptCollectSecond['СДЗ'],'agrempl'),$deptCollectSecond['СДЗ']);
        //Купиполис
        $SD_sait = [
            'kupipolis' => $SD_managerSait,
            'feesplan' => array_sum(array_column($SD_managerSait, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerSait, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerSait, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerSait, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerSait, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerSait, 'total_refund_sum'))
        ];
        $SD_sdz = [
            'СДЗ' => $SD_managerSDZ,
            'feesplan' => array_sum(array_column($SD_managerSDZ, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerSDZ, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerSDZ, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerSDZ, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerSDZ, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerSDZ, 'total_refund_sum'))
        ];

        $SD_managerOS6 = array_combine(
            array_column($deptCollectSecond['Отделение страхования 6'],'agrempl'),$deptCollectSecond['Отделение страхования 6']);
        $SD_managerOS1 = array_combine(
            array_column($deptCollectSecond['Отделение страхования 1'],'agrempl'),$deptCollectSecond['Отделение страхования 1']);
        $SD_managerOS3 = array_combine(
            array_column($deptCollectSecond['Отделение страхования 3'],'agrempl'),$deptCollectSecond['Отделение страхования 3']);
        //Отдел страхования
        $SD_os6 =[
            'Отделение страхования 6' => $SD_managerOS6,
            'feesplan' => array_sum(array_column($SD_managerOS6, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerOS6, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerOS6, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerOS6, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerOS6, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerOS6, 'total_refund_sum'))
        ];
        $SD_os1 =[
            'Отделение страхования 1' => $SD_managerOS1,
            'feesplan' => array_sum(array_column($SD_managerOS1, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerOS1, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerOS1, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerOS1, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerOS1, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerOS1, 'total_refund_sum'))
        ];
        $SD_os3 =[
            'Отделение страхования 3' => $SD_managerOS3,
            'feesplan' => array_sum(array_column($SD_managerOS3, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerOS3, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerOS3, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerOS3, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerOS3, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerOS3, 'total_refund_sum'))
        ];

        $SD_managerDSV = array_combine(array_column($deptCollectSecond['ДСВ'],'agrempl'),$deptCollectSecond['ДСВ']);
        //ДСВ
        $SD_dsv_u = [
            'ДСВ' => $SD_managerDSV,
            'feesplan' => array_sum(array_column($SD_managerDSV, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDSV, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDSV, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDSV, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDSV, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDSV, 'total_refund_sum'))
        ];
        $SD_managerDMS = array_combine(array_column($deptCollectSecond['ДМС'],'agrempl'),$deptCollectSecond['ДМС']);
        //ДМС
        $SD_dms_u = [
            'ДМС' => $SD_managerDMS,
            'feesplan' => array_sum(array_column($SD_managerDMS, 'feesplan')),
            'brutto_prem' => array_sum(array_column($SD_managerDMS, 'brutto_prem')),
            'comission_and_rating' => array_sum(array_column($SD_managerDMS, 'comission_and_rating')),
            'dsd' => array_sum(array_column($SD_managerDMS, 'dsd')),
            'netto_refund_sum' => array_sum(array_column($SD_managerDMS, 'netto_refund_sum')),
            'total_refund_sum' => array_sum(array_column($SD_managerDMS, 'total_refund_sum'))
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
