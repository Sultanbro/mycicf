<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentcoinHistory extends Model
{
    protected $table = 'centcoin_histories';

    public function getTotal() {
        $centcoin = Centcoin::where('user_isn', $this->changed_user_isn)
            ->first();
        if($centcoin === null){
            $centcoin = new Centcoin();
            $centcoin->user_isn = $this->changed_user_isn;
            $centcoin->centcoins = 0;
        }

        $this->total = $this->operation_type == 'add' ? ($centcoin->centcoins + $this->quantity) : ($centcoin->centcoins - $this->quantity);
    }

    public function save(array $options = []){
        $this->getTotal();
        parent::save($options);
    }

}
