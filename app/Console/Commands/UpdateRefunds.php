<?php

namespace App\Console\Commands;

use App\FullConstructor;
use App\Region;
use App\City;
use DB;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;
use App\Refund;

class UpdateRefunds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:refunds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить возвраты';

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
    public function handle(){
        $getLastRefund = Refund::orderBy('id', 'desc')->first();
        $last_id = isset($getLastRefund->kupipolis_id) ? $getLastRefund->kupipolis_id : 1;

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $od = file_get_contents("http://t3.kupipolis.kz/refunds?token=ef292d4f1f2429cae344d090cc29b675&isn=506791&id=$last_id", false, stream_context_create($arrContextOptions));
        if (0 === strpos(bin2hex($od), 'efbbbf')) {
            $od = substr($od, 3);
        }
        $od = json_decode($od)->refunds;
        $count_od = count($od);

        echo "Количество записей $count_od \n";
        foreach($od as $refund) {
            $query = new Refund();
            $query->kupipolis_id = $refund->id;
            $query->signed = $refund->signed;
            $query->confirmed = $refund->confirmed;
            $query->client_id = $refund->client_id;
            $query->claim_isn = $refund->claim_isn;
            $query->claim_id = $refund->claim_id;
            $query->agr_isn = $refund->agr_isn;
            $query->amount_p = $refund->amount_p;
            $query->claim_date = $refund->claim_date;
            $query->iin = $refund->iin;
            $query->full_data = $refund->full_data;
            $query->rv_isn = $refund->rv_isn;
            if ($query->save()) {
                echo "Новая запись rv_isn $refund->rv_isn успешно записана \n";
            }
        }
    }

}
