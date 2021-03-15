<?php

namespace App;

use App\Http\Controllers\NotificationController;
use App\Library\Services\NotificationServiceInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CentcoinHistory
 *
 * @package App
 * @property string $type
 * @property string $description
 * @property integer $quantity
 * @property string $operation_type
 * @property integer $total
 * @property integer $user_isn
 * @property integer $changed_user_isn
 */

class CentcoinHistory extends Model
{
    const OPERATION_TYPE_ADD = 'add';
    const OPERATION_TYPE_SPEND = 'minus';

    protected $table = 'centcoin_histories';

    public function getTotal() {
        $centcoin = Centcoin::where('user_isn', $this->changed_user_isn)
            ->first();

        if($centcoin === null) {
            $centcoin = new Centcoin();
            $centcoin->user_isn = $this->changed_user_isn;
            $centcoin->centcoins = 0;
        }

        $this->total = $this->operation_type == 'add' ? ($centcoin->centcoins + $this->quantity) : ($centcoin->centcoins - $this->quantity);
    }

    public function setTotal(){
        $centcoin = Centcoin::where('user_isn', $this->changed_user_isn)
            ->first();
        if($centcoin === null) {
            $centcoin = new Centcoin();
            $centcoin->user_isn = $this->changed_user_isn;
            $centcoin->centcoins = 0;
        }

        $centcoin->centcoins = $this->total;

        $centcoin->save();
    }

    public function save(array $options = []) {
        $this->getTotal();
        parent::save($options);
        $this->setTotal();
        (new NotificationController(app(NotificationServiceInterface::class)))->sendCentcoinNotify($this);
    }
}
