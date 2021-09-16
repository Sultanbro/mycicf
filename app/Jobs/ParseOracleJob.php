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
        $last_id = ParseCollects::max('agr_isn') ?? 0;
        $rows = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('*')
            ->where('f1', '>', $last_id)
            ->where('group_name', '=', "Отчет по ежедневным сборам")
            ->orderBy('f1')
            ->limit($limit)
            ->get();

        $last_id2 = ParsePays::max('claim_isn') ?? 0;
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
            $data->agr_isn = $row->f1;
            $data->prod_isn = $row->f3;
            $data->prod_name = $row->f4;
            $data->client_isn = $row->f5;
            $data->client = $row->f6;
            $data->dateAccept = $row->f8;
            $data->brutto_prem = $row->f9;
            $data->dsd = $row->f10;
            $data->comission_and_rating = $row->f11;
            $data->ins_code = $row->f15;
            $data->ins_name = $row->f16;
            $data->main_dept_isn = $row->f17;
            $data->main_dept_name = $row->f18;
            $data->dept_isn = $row->f19;
            $data->dept_name = $row->f20;
            $data->empl_isn = $row->f21;
            $data->empl_name = $row->f22;
            $data->group_name = $row->group_name;

            $data->save();
            //$collect++;
            //dump($collect);
        }

        foreach ($rows2 as $row) {
            $data = new ParsePays();
            $data->claim_isn = $row->f1;
            $data->agrInsClassIsn1 = $row->f3;
            $data->agrInsClassName = $row->f4;
            $data->agrProductIsn = $row->f5;
            $data->agrProductName = $row->f6;
            $data->agr_client_isn = $row->f10;
            $data->agr_client_name = $row->f11;
            $data->dateAccept = $row->f15;
            $data->total_refund_sum = $row->f16;
            $data->netto_refund_sum = $row->f17;
            $data->empl_name = $row->f21;
            $data->empl_isn = $row->f22;
            $data->main_dept_name = $row->f23;
            $data->main_dept_isn = $row->f24;
            $data->dept_name = $row->f25;
            $data->dept_isn = $row->f26;
            $data->group_name = $row->group_name;

            $data->save();
            $pays++;
            dump($pays);
        }

        ParseOracleJob::dispatch();
    }
}
