<?php

namespace App\Http\Controllers;


use App\ParseCollects;
use App\ParsePays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $builder = DB::table('parse_oracle_collects')
            ->select(
                'parse_oracle_collects.id',
                'parse_oracle_collects.dateAccept',
                'parse_oracle_collects.empl_isn',
                'parse_oracle_collects.dept_isn',
                'parse_oracle_collects.dept_name',
                'parse_oracle_collects.empl_name',
                'parse_oracle_collects.dsd',
                'parse_oracle_collects.comission_and_rating',
                'parse_oracle_pays.dateAccept',
                'parse_oracle_pays.total_refund_sum',
                'parse_oracle_pays.netto_refund_sum')
            ->join('parse_oracle_pays', function ($join) {
                $join->on('parse_oracle_collects.dateAccept', '=','parse_oracle_pays.dateAccept');
                //$join->on('parse_oracle_collects.empl_isn', '=', 'parse_oracle_pays.empl_isn');
            });
        $collects = $builder->where(\DB::raw('parse_oracle_collects.dateAccept'), '=', $first_date)
            ->get()->toArray();
        dd($collects);

/*                if(date('d.m.Y', strtotime($first_date)) === $first_date
                    && date('d.m.Y', strtotime($second_date)) === $second_date ){
                    dd($first_date,$second_date,'yes');
                }else {
                    $builder = DB::table('parse_oracle_collects')
                        ->select(\DB::raw('substr(parse_oracle_collects.dateAccept, 4) as table_1'), 'parse_oracle_collects.empl_isn as isn',
                            'parse_oracle_collects.id',
                            'parse_oracle_collects.empl_isn',
                            'parse_oracle_collects.dept_isn',
                            'parse_oracle_collects.dept_name',
                            'parse_oracle_collects.empl_name',
                            'parse_oracle_collects.dsd',
                            'parse_oracle_collects.comission_and_rating',
                            'parse_oracle_pays.total_refund_sum',
                            'parse_oracle_pays.netto_refund_sum')
                        ->join('parse_oracle_pays', function ($join) {
                            $join->on(DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', DB::raw('substr(parse_oracle_pays.dateAccept, 4)'));
                            $join->on('parse_oracle_collects.empl_isn', '=', 'parse_oracle_pays.empl_isn');
                        });
                    $collects = $builder->where(\DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', $first_date)
                        ->get()->toArray();
                    $collects2 = $builder->where(\DB::raw('substr(parse_oracle_collects.dateAccept, 4)'), '=', $second_date)
                        ->get()->toArray();
                }*/

        /*        $query = 'select substr(parse_oracle_collects.dateAccept, 4) as table_1, `parse_oracle_collects`.`empl_isn` as `isn` from `parse_oracle_collects` inner join `parse_oracle_pays` on substr(parse_oracle_collects.dateAccept, 4) = substr(parse_oracle_pays.dateAccept, 4)
                            AND parse_oracle_collects.empl_isn = parse_oracle_pays.empl_isn';*/







        $deptCollectFirst = [];
        $deptCollectSecond = [];
        foreach (self::$departmentNames as $departmentName) {
            $deptCollectFirst[$departmentName] = [];
            $deptCollectSecond[$departmentName] = [];
        }

        foreach ($collects as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            //$deptCollectData[$arrName] = $collect;
            array_push($deptCollectFirst[$arrName], $collect);
        }

        foreach ($collects2 as $collect) {
            $arrName = $this->getCollectDeptName($collect['deptIsn']);
            if (!$arrName)
                continue;
            //$deptCollectData[$arrName] = $collect;
            array_push($deptCollectSecond[$arrName], $collect);
        }
        dd($deptCollectFirst, $deptCollectSecond);

//Общая сумма
        /*            $key = 'DSD';
                    $sum = array_sum(array_column($deptCollectData['aktobe'],$key));*/


        return response()->json([
            'success' => true,
            'data' => $deptCollectFirst,
            'data1' => $deptCollectSecond,

        ]);

    }
}
