<?php

namespace App\Http\Controllers;

use App\ParseOracle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OracleParseController extends Controller
{

    public  function getData(){

        //Управление партнерских продаж
/*        $data = DB::connection('oracle')
       ->select('select * from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
        and f19 = \'3991836\' and ROWNUM < 10');*/

        //$data = DB::connection('oracle')->table('inslab.centras_temp_migrate')->orderBy('group_name')->chunk('100',function ($rows){});

/*        //Управление активных продаж
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
        and f19 = \'4559142\' and ROWNUM < 200');

        //Управление корпоративного страхования №1
                $data = DB::connection('oracle')
                    ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                and f19 = \'1445781\' and ROWNUM < 200');

        //Управление корпоративного страхования №2
                  $data = DB::connection('oracle')
                  ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                and f19 = \'1445783\' and ROWNUM < 200');

        //Управление корпоративного страхования №3
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                and f19 = \'1445784\' and ROWNUM < 200');

        //Управление корпоративных продаж
                $data = DB::connection('oracle')
                 ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'4784105\' and ROWNUM < 10');

        //Управление страхования №1
               $data = DB::connection('oracle')
                 ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'1445789\' and ROWNUM < 10');

        //Управление страхования №2
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'1445790\' and ROWNUM < 10');

        //Управление страхования №3
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'1445791\' and ROWNUM < 10');

        //Управление страхования №4
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'1445792\' and ROWNUM < 10');

        //Управление страхования №5
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'1445793\' and ROWNUM < 10');

        //Управление страхования №6
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'3492324\' and ROWNUM < 10');

        //Управление страхования №7
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'3492327\' and ROWNUM < 10');

        //Управление электронных продаж
        $data = DB::connection('oracle')
            ->select('select f8,f10,f16,f19,f20, group_name from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'
                 and f19 = \'3991842\' and ROWNUM < 10');*/

/*        $data = DB::connection('oracle')->
        select('select COUNT(*) as count from inslab.centras_temp_migrate where group_name = \'Отчет по ежедневным сборам\'');*/


/*        $rows = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('f8','f10','f11','f16','f19','f20', 'group_name')
            ->where('group_name', '=', "Отчет по ежедневным сборам")
            ->orderBy('group_name')
            ->limit(3)
            ->get();

        foreach ($rows as $row){
            $p = new ParseOracle();
            $p->CurrCode = $row->f8;
            $p->AmountP = $row->f10;
            $p->DSD = $row->f11;
            $p->rating = $row->f16;
            $p->DeptISN = $row->f19;
            $p->DeptName = $row->f20;
            $p->group_name = $row->group_name;

            $p->save();*/

    }

}
