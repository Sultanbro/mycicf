<?php

namespace App\Library;

use App\Centcoin;
use App\CentcoinHistory;
use App\User;
use Illuminate\Database\Eloquent\Model;

class CentcoinService
{
    public function spendAll(array $isns, $auth_user = null) {
        foreach ($isns as $isn) {
            // $user = User::whereIsn($result)->first();
            $balance = User::getBalance($isn);

            $hist = new CentcoinHistory();
            $hist->type = 'Обнуление';
            $hist->description = 'Ежегодное обнуление';
            $hist->quantity = $balance;
            $hist->operation_type = 'minus';
            $hist->total = 0;
            $hist->user_isn = $auth_user ? $auth_user->ISN : '00';
            $hist->changed_user_isn = $isn;
            $hist->save2();

            Centcoin::where('user_isn', '=', $isn)->update(['centcoins' => $balance]);
        }
    }
}
