<?php

namespace App\Library;

use App\Centcoin;
use App\CentcoinHistory;
use App\User;
use Illuminate\Database\Eloquent\Model;

class CentcoinService
{
    public function spendAll(array $isns) {
        foreach ($isns as $isn) {
            // $user = User::whereIsn($result)->first();
            $balance = User::getBalance($isn);

            $hist = new CentcoinHistory();
            $hist->type = 'Обнуление';
            $hist->description = 'Ежегодное обнуление';
            $hist->quantity = $balance;
            $hist->operation_type = 'minus';
            $hist->total = 0;
            $hist->user_isn = auth()->user()->ISN;
            $hist->changed_user_isn = $isn;
            $hist->save2();

            $balance = User::getBalance($isn);
            Centcoin::where('user_isn', '=', $isn)->update(['centcoins' => $balance]);
        }
    }
}
