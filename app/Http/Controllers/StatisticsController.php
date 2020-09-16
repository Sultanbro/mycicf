<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(){
        return view('statistics');
    }

    public function getReport(Request $request, KiasServiceInterface $kias){
        $ISN = $request->isn;
        /*
         * 1446265
         * 1446171
         * 1446285
         */
        $dateBeg = date('d.m.Y', strtotime($request->dateBeg));
        $dateEnd = date('d.m.Y', strtotime($request->dateEnd));
        $response = $kias->GetInfoUser($dateBeg, $dateEnd, $ISN);
        if($response->error) {
            return response()
                ->json([
                    'success' => false,
                    'error' => $response->error->text,
                ]);
        }
        return response()
            ->json([
                'success' => true,
                'info' => $response
            ]);
    }
}
