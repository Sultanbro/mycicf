<?php

namespace App\Http\Controllers;

use App\Centcoin;
use App\CentcoinHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CentcoinsController extends Controller
{
    public function getOperationsList(Request $request) {
        $dateBeg = new Carbon(strtotime($request->dateBeg));
        $dateEnd = new Carbon(strtotime($request->dateEnd));

        $histories = CentcoinHistory::where('created_at', '>', $dateBeg)
            ->where('created_at', '<', $dateEnd)
            ->where('changed_user_isn', Auth::user()->ISN)
            ->get();

        $response = [];

        foreach ($histories as $history ) {
            array_push($response, [
                'id' => $history->id,
                "type" => $history->type,
                "description" => $history->description,
                "quantity" => $history->quantity,
                "total" => $history->total,
            ]);
        }

        return $response;
    }

    public function getCentcoins(Request $request) {
        $isn = $request->isn;

        $centcoin = Centcoin::where('user_isn', $isn)
            ->first();

        if($centcoin === null){
            $centcoin = new Centcoin();
            $centcoin->user_isn = $isn;
            $centcoin->centcoins = 0;
            $centcoin->save();
        }

        return $centcoin->centcoins;
    }

    public function getView() {
        return view('centcoins');
    }
}
