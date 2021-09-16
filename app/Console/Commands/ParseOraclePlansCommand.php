<?php

namespace App\Console\Commands;

use App\ParsePlans;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ParseOraclePlansCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oracle:plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $plans = DB::connection('oracle')->select("
             select EXTRACT(YEAR FROM AcceptYear) year,
            EXTRACT(MONTH FROM AcceptYear) month,
            AcceptYear as planMonth,
            sum(FeesPlan) FeesPlan,AgrEmpl
            from (select dc.valn3 AgrEmpl,
            to_date('01.01.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn20, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.02.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn21, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.03.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn22, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.04.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn23, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.05.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn24, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.06.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn25, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.07.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn26, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.08.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn27, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.09.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn28, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.10.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn29, 0) FeesPlan
            from inslab.docrow dc
            where inslab.dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.11.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn30, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            union all
            select dc.valn3 AgrEmpl,
            to_date('01.12.' || dc.valn1, 'DD.MM.YYYY') AcceptYear,
            nvl(dc.valn31, 0) FeesPlan
            from inslab.docrow dc
            where dc.docisn in
            (select isn
            from inslab.docs
            where classisn = 714091 and statusisn = 2518
            and statusisn <>
            2515) --in (6638188,6545790)
            )
            group by EXTRACT(YEAR FROM AcceptYear),
            EXTRACT(MONTH FROM AcceptYear),
            AcceptYear,AgrEmpl
                    ");
        $count = 0;

        foreach ($plans as $plan){
            $data = new ParsePlans();
            $data->agrempl = $plan->agrempl;
            $data->feesplan = $plan->feesplan;
            $data->year = $plan->year;
            $data->month = $plan->month;
            $data->save();
            $count++;
            dump($count);
        }
    }
}
