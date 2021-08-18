<?php

namespace App\Jobs;

use App\ParseCollects;
use App\ParsePays;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseOracleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $limit = config('oracle.row_limit');
        $last_id = ParseCollects::max('agrIsn') ?? 0;
        $rows = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('*')
            ->where('f1', '>', $last_id)
            ->where('group_name', '=', "Отчет по ежедневным сборам")
            ->orderBy('f1')
            ->limit($limit)
            ->get();

        $last_id2 = ParsePays::max('claimIsn') ?? 0;
        $rows2 = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('*')
            ->where('f1', '>', $last_id2)
            ->where('group_name', '=', "Отчет по журналу выплат")
            ->orderBy('f1')
            ->limit($limit)
            ->get();

        //$collect = 0;
        $pays = 0;

        foreach ($rows as $row) {
            $data = new ParseCollects();
            $data->agrIsn = $row->f1;
            $data->agrId = $row->f2;
            $data->prodIsn = $row->f3;
            $data->prodName = $row->f4;
            $data->strIsn = $row->f5;
            $data->insurer = $row->f6;
            $data->jur = $row->f7;
            $data->dateAccept = $row->f8;
            $data->amountP = $row->f9;
            $data->DSD = $row->f10;
            $data->comissionProc = $row->f11;
            $data->valn = $row->f12;
            $data->amountP = $row->f13;
            $data->agrAgent = $row->f14;
            $data->insCode = $row->f15;
            $data->insName = $row->f16;
            $data->mainDeptIsn = $row->f17;
            $data->mainDeptName = $row->f18;
            $data->deptIsn = $row->f19;
            $data->deptName = $row->f20;
            $data->emplISN = $row->f21;
            $data->emplName = $row->f22;
            $data->group_name = $row->group_name;

            $data->save();
            //$collect++;
            //dump($collect);
        }

        foreach ($rows2 as $row) {
            $data = new ParsePays();
            $data->claimIsn = $row->f1;
            $data->claimId = $row->f2;
            $data->agrInsClassIsn1 = $row->f3;
            $data->agrInsClassName = $row->f4;
            $data->agrProductIsn = $row->f5;
            $data->agrProductName = $row->f6;
            $data->isn = $row->f7;
            $data->agrId = $row->f8;
            $data->agrDateSign = $row->f9;
            $data->agrClientIsn = $row->f10;
            $data->agrClientName = $row->f11;
            $data->agrClientJur = $row->f12;
            $data->territoryName = $row->f13;
            $data->placeClaim = $row->f14;
            $data->docDate = $row->f15;
            $data->totalRefundSum = $row->f16;
            $data->nettoRefundSum = $row->f17;
            //$data->remarcClaim = $row->f18;
            $data->agrSubject = $row->f19;
            $data->agrAgent = $row->f20;
            $data->emplName = $row->f21;
            $data->emplIsn = $row->f22;
            $data->mainDeptName = $row->f23;
            $data->mainDeptIsn = $row->f24;
            $data->deptName = $row->f25;
            $data->deptIsn = $row->f26;
            $data->group_name = $row->group_name;

            $data->save();
            $pays++;
            dump($pays);
        }

        ParseOracleJob::dispatch();
    }
}