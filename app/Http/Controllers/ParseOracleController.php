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

    /*public function dateTypes(){
        return [
            'year',
            'month',
            'days',
        ];
    }*/

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


                if(date('d.m.Y', strtotime($first_date)) === $first_date
                    && date('d.m.Y', strtotime($second_date)) === $second_date ){

                    $builder = DB::table('parse_oracle_collects')
                        ->select(
                            'parse_oracle_collects.dateAccept',
                            'parse_oracle_collects.empl_isn',
                            'parse_oracle_collects.id',
                            'parse_oracle_collects.empl_isn',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.brutto_prem',
                            'parse_oracle_collects.dsd',
                            'parse_oracle_collects.comission_and_rating',
                            'parse_oracle_pays.total_refund_sum',
                            'parse_oracle_pays.netto_refund_sum')
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','=','parse_oracle_collects.empl_isn');
                            $join->on('parse_oracle_pays.dateAccept','=','parse_oracle_collects.dateAccept');
                        });
                    $collects = $builder->where('parse_oracle_collects.dateAccept', '=', $first_date)->get()->toArray();

                    $model = DB::table('parse_oracle_collects')
                        ->select(
                            'parse_oracle_collects.dateAccept',
                            'parse_oracle_collects.empl_isn',
                            'parse_oracle_collects.id',
                            'parse_oracle_collects.empl_isn',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.brutto_prem',
                            'parse_oracle_collects.dsd',
                            'parse_oracle_collects.comission_and_rating',
                            'parse_oracle_pays.total_refund_sum',
                            'parse_oracle_pays.netto_refund_sum')
                        ->leftJoin('parse_oracle_pays', function ($join) {
                            $join->on('parse_oracle_pays.empl_isn','=','parse_oracle_collects.empl_isn');
                            $join->on('parse_oracle_pays.dateAccept','=','parse_oracle_collects.dateAccept');
                        });
                    $collects2 = $model->where('parse_oracle_collects.dateAccept', '=', $second_date)->get()->toArray();
                }else {
                $builder = DB::table('parse_oracle_collects')
                    ->select(
                        'parse_oracle_collects.id',
                        'parse_oracle_collects.empl_isn',
                        'parse_oracle_collects.dept_isn',
                        'parse_oracle_collects.dept_name',
                        'parse_oracle_collects.empl_name',
                        'parse_oracle_collects.brutto_prem',
                        'parse_oracle_collects.dsd',
                        'parse_oracle_collects.comission_and_rating',
                        'parse_oracle_pays.total_refund_sum',
                        'parse_oracle_pays.netto_refund_sum')
                    ->leftJoin('parse_oracle_pays', function ($join) {
                        $join->on(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', DB::raw('substr(parse_oracle_pays.dateAccept, 4)'));
                        $join->on('parse_oracle_collects.empl_isn', '=', 'parse_oracle_pays.empl_isn');
                    });
                $collects = $builder->where(\DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', $first_date)
                    ->get()->toArray();

                $model = DB::table('parse_oracle_collects')
                    ->select(
                        'parse_oracle_collects.id',
                        'parse_oracle_collects.empl_isn',
                        'parse_oracle_collects.dept_isn',
                        'parse_oracle_collects.dept_name',
                        'parse_oracle_collects.empl_name',
                        'parse_oracle_collects.brutto_prem',
                        'parse_oracle_collects.dsd',
                        'parse_oracle_collects.comission_and_rating',
                        'parse_oracle_pays.total_refund_sum',
                        'parse_oracle_pays.netto_refund_sum')
                    ->leftJoin('parse_oracle_pays', function ($join) {
                        $join->on(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', DB::raw('substr(parse_oracle_pays.dateAccept, 4)'));
                        $join->on('parse_oracle_collects.empl_isn', '=', 'parse_oracle_pays.empl_isn');
                    });
                $collects2 = $model->where(\DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', $second_date)
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

//Рабочий вариант 1
        //dks
        $total_netto = array_values(array_reduce($deptCollectFirst['dks'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $dks = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['uks1'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $uks1 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['uks2'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $uks2 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['uks3'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $uks3 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['uks4'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $uks4 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['ukr'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $ukr = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        //*******************
        //dsp
        $total_netto = array_values(array_reduce($deptCollectFirst['dsp'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $dsp = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['almaty'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $almaty = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['uap'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $uap = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us1'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us1 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us2'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us2 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us3'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us3 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us4'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us4 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us5'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us5 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us6'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us6 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['us7'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $us7 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        //*******************
        //drpo
        $total_netto = array_values(array_reduce($deptCollectFirst['drpo'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $drpo = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['upp'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $upp = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        //*******************
        //dp
        $total_netto = array_values(array_reduce($deptCollectFirst['dp'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $dp = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        //Филиалы
        $total_netto = array_values(array_reduce($deptCollectFirst['nur_sultan'],
                    function ($a, $v){
                        $k = $v['id'];
                        if(!array_key_exists($k,$a)){
                            $a[$k] = $v;
                        }else {
                            $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                            $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                        }
                        return $a;
                    },
                    array()
                ));
        $nur_sultan = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['aktobe'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $aktobe = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['shymkent'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $shymkent = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['koksh'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $koksh = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['semei'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $semei = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['atyrau_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $atyrau_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['aktobe_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $aktobe_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['kar_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $kar_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['kos_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $kos_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['kyz_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $kyz_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['mang_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $mang_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['pavlo_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $pavlo_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['jambyl_obl'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $jambyl_obl = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['sko'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $sko = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['vko'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $vko = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['kupipolis'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $kupipolis = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['sdz'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $sdz = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['os6'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $os6 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['os1'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $os1 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['os3'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $os3 = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['dsv'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $dsv = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $total_netto = array_values(array_reduce($deptCollectFirst['dms'],
            function ($a, $v){
                $k = $v['id'];
                if(!array_key_exists($k,$a)){
                    $a[$k] = $v;
                }else {
                    $a[$k]['total_refund_sum'] += $v['total_refund_sum'];
                    $a[$k]['netto_refund_sum'] += $v['netto_refund_sum'];
                }
                return $a;
            },
            array()
        ));
        $dms = array_values(array_reduce($total_netto,
            function ($b, $c){
                $k = $c['empl_name'];
                if(!array_key_exists($k,$b)){
                    $b[$k] = $c;
                }else {
                    $b[$k]['brutto_prem'] += $c['brutto_prem'];
                    $b[$k]['dsd'] += $c['dsd'];
                    $b[$k]['comission_and_rating'] += $c['comission_and_rating'];
                }
                return $b;
            },
            array()
        ));

        $data = [
            [
                'empl_name' => 'ДКС',
                'id' => 1,
                'children' => [
                        0 => [
                            'empl_name' => 'Менеджеры ДКС',
                            'id' => 2,
                            'brutto_prem' => 1,
                            'dsd' => 2,
                            'comission_and_rating' => 3,
                            'total_refund_sum' => 4,
                            'netto_refund_sum' => 5,
                            'children' => $dks,
                        ],
                    1 => [
                        'empl_name' => 'УКС №1',
                        'id' => 3,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $uks1,
                    ],
                    2 => [
                        'empl_name' => 'УКС №2',
                        'id' => 4,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $uks2,
                    ],
                    3 => [
                        'empl_name' => 'УКС №3',
                        'id' => 5,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $uks3,
                    ],
                    4 => [
                        'empl_name' => 'УКС №4',
                        'id' => 6,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $uks4,
                    ],
                    5 => [
                        'empl_name' => 'УКР',
                        'id' => 7,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $ukr,
                    ],
                ]
            ],
            [
                'empl_name' => 'ДСП',
                'id' => 101,
                'children' => [
                    0 => [
                        'empl_name' => 'Менеджеры ДСП',
                        'id' => 2,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $dsp,
                    ],
                    1 => [
                        'empl_name' => 'г.Алматы',
                        'id' => 3,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $almaty,
                    ],
                    2 => [
                        'empl_name' => 'УАП',
                        'id' => 4,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $uap,
                    ],
                    3 => [
                        'empl_name' => 'УС №1',
                        'id' => 5,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us1,
                    ],
                    4 => [
                        'empl_name' => 'УС №2',
                        'id' => 6,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us2,
                    ],
                    5 => [
                        'empl_name' => 'УС №3',
                        'id' => 7,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us3,
                    ],
                    6 => [
                        'empl_name' => 'УС №4',
                        'id' => 8,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us4,
                    ],
                    7 => [
                        'empl_name' => 'УС №5',
                        'id' => 9,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us5,
                    ],
                    8 => [
                        'empl_name' => 'УС №6',
                        'id' => 10,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us6,
                    ],
                    9 => [
                        'empl_name' => 'УС №7',
                        'id' => 11,
                        'brutto_prem' => 1,
                        'dsd' => 2,
                        'comission_and_rating' => 3,
                        'total_refund_sum' => 4,
                        'netto_refund_sum' => 5,
                        'children' => $us7,
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
