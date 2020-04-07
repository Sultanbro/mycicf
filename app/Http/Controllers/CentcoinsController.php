<?php

namespace App\Http\Controllers;

use App\Centcoin;
use App\CentcoinHistory;
use App\StoreItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;

class CentcoinsController extends Controller
{
    public function getOperationsList(Request $request) {
        $dateBeg = new Carbon(strtotime($request->dateBeg));
        $dateEnd = new Carbon(strtotime($request->dateEnd));

        $histories = CentcoinHistory::where('created_at', '>', $dateBeg)
            ->where('created_at', '<', $dateEnd)
            ->where('changed_user_isn', $request->isn)
            ->get();

        $response = [];

        foreach ($histories as $history ) {
            array_push($response, [
                'id' => $history->id,
                "type" => $history->type,
                "description" => $history->description,
                "quantity" => $history->operation_type === "add" ? $history->quantity : $history->quantity*(-1),
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

    public function getItemsStorage() {
        $store_items_model = StoreItem::where('count', '>', '0')->get();

        $store_items = [];

        foreach ($store_items_model as $item) {
            array_push($store_items, [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'updated_by' => $item['updated_by']
            ]);
        }
        return $store_items;
    }

    public function buyItem(Request $request) {

        $price = StoreItem::where('id', $request->itemId)->first();
        $model = new CentcoinHistory();
        $model->type = 'Оплата';
        $model->description = "Оплата за ".$price->name;
        $model->quantity =$price->price;
        $model->operation_type = CentcoinHistory::OPERATION_TYPE_SPEND;
        $model->user_isn = $request->isn;
        $model->changed_user_isn = $request->isn;
        $model->save();



    }

    public function getView() {
        return view('centcoins');
    }

    public function spendCentcoinsView() {
        return view('spend_centcoins');
    }

}
