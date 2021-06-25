<?php

namespace App\Console\Commands;

use App\TblForPayEds;
use Illuminate\Console\Command;

class UpdatePayoutRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:payoutrequest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting payout request from kupipolis  lk';

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
        $getLastPayOut = TblForPayEds::orderBy('id', 'desc')->first();
        $last_id = isset($getLastPayOut->id) ? $getLastPayOut->id : 1;

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $po = file_get_contents("https://kupipolis.kz/ru/payout?token=ef292d4f1f2429cae344d090cc29b675&isn=506791&id=$last_id", false, stream_context_create($arrContextOptions));
        if (0 === strpos(bin2hex($po), 'efbbbf')) {
            $po = substr($po, 3);
        }
        $po = json_decode($po)->payout;
        $count_po = count($po);
        echo "Количество записей $count_po \n";
        foreach($po as $payout) {
            $query = new TblForPayEds();
            $query->isn = $payout->isn;
            $query->plea = $payout->plea;
            $query->iin = $payout->iin;
            $query->name = $payout->name;
            $query->date_sign = $payout->date_sign;
            $query->signed = $payout->signed;
            $query->confirmed = $payout->confirmed;
            $query->confirmed = $payout->confirmed;
            $query->iin_fail = $payout->iin_fail;
            $query->full_data = $payout->full_data;
            $query->po_isn = $payout->po_isn;
            $query->client_id = $payout->client_id;
            $query->filetype = $payout->filetype;
            $query->refundisn = $payout->refundisn;
            $query->refundid = $payout->refundid;
            if ($query->save()) {
                echo "Новая запись po_isn $payout->po_isn успешно записана \n";
            }
        }
    }

}
