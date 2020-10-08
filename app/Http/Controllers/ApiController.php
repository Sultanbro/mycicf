<?php

namespace App\Http\Controllers;

use App\Centcoin;
use App\CentcoinHistory;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getInfo(Request $request){

        $coins = Centcoin::where('user_isn', $request->isn)->first();

        $info = CentcoinHistory::where('user_isn', $request->isn)->get();

        return response()->json([
            'coins' => $coins->centcoins,
            //'coins_history' => json_encode($info),
            'coins_history' => json_encode($coins->fullInfo),
        ]);
    }
}
