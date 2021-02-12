<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Centcoin;
use App\CentcoinApply;
use App\CentcoinHistory;
use App\Observers\CentcoinObserver;
use App\StoreItem;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CentcointExports;

class CentcoinsController extends Controller
{
    public function getListView(){
        return view('centcoins.list');
    }

    public function getSpendView(){
        return view('centcoins.spend');
    }

    public function getReplenishView(){
        return view('centcoins.replenish');
    }

    public function getHistoryView(){
        return view('centcoins.history');
    }

    public function getItemsView(){
        return view('centcoins.items');
    }
    //Заявка в Админ
    public function getCoinReqView(){
        return view('centcoins.newzapros');
    }

    public function getNewZapros(Request $request){
        $result = [];
        foreach(CentcoinApply::all() as $data){
            array_push($result, [
                'id' => $data->id,
                'name' => (new User)->getFullName($data->user_isn),
                'updated' => date('d.m.Y H:i:s', strtotime($data->updated_at)),
                'coins' => $data->centcoins,
                'total' => $data->total,
                'status' => 'status',

            ]);
        }
        dd($result);

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }


    public function getUserList(Request $request){
        $result = [];
        foreach(Centcoin::all() as $data){
            array_push($result, [
                'id' => $data->id,
                'name' => (new User)->getFullName($data->user_isn),
                'coins' => $data->centcoins,
                'updated' => date('d.m.Y H:i:s', strtotime($data->updated_at)),
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function getReport(){
        return Excel::download(new CentcointExports, 'Сенткоины_'.date("d.m.Y H:i:s").'.xlsx');
        return back();
    }

    public function getHistoryList(Request $request){
        $result = [];
        foreach(CentcoinHistory::all() as $data){
            array_push($result, [
                'id' => $data->id,
                'type' => $data->type,
                'to' => (new User)->getFullName($data->changed_user_isn),
                'from' => (new User)->getFullName($data->user_isn),
                'coins' => $data->quantity,
                'description' => $data->description,
                'updated' => date('d.m.Y H:i:s', strtotime($data->created_at)),
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function addCoins(Request $request){
        $success = true;
        $error = '';
        $users = $request->users;
        $description = $request->description;
        $count = $request->count;
        $ids = [];
        DB::beginTransaction();
        foreach ($users as $userID){
            foreach ($this->getUserChilds($userID) as $user) {
                try {
                    $history = new CentcoinHistory();
                    $history->type = 'Поступление';
                    $history->description = $description;
                    $history->quantity = $count;
                    $history->operation_type = CentcoinHistory::OPERATION_TYPE_ADD;
                    $history->user_isn = Auth::user()->ISN;
                    $history->changed_user_isn = $user;
                    $history->save();
                    $ids[] = $history->id;
                } catch (\Exception $ex) {
                    $success = false;
                    $error = $ex->getMessage();
                }
            }
        }
        if($success){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return response()
            ->json([
                'success' => $success,
                'error' => $error,
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function spendCoins(Request $request){
        $success = true;
        $error = '';
        $user = $request->user;
        $count = $request->count;
        $description = $request->description;
        try{
            $history = new CentcoinHistory();
            $history->type = 'Оплата';
            $history->description = $description;
            $history->quantity = $count;
            $history->operation_type = CentcoinHistory::OPERATION_TYPE_SPEND;
            $history->user_isn = Auth::user()->ISN;
            $history->changed_user_isn = $user;
            $history->save();
        }catch (\Exception $ex){
            $success = false;
            $error = $ex->getMessage();
        }
        return response()
            ->json([
                'success' => $success,
                'error' => $error,
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

    public function getUserChilds($id){
        $result = [];
        $model = Branch::where('kias_id', $id)->first();
        if(count($model->childs)){
            $result = array_merge($result, $this->getChilds($id));
        }else{
            array_push($result, $id);
        }
        return $result;
    }

    public function getChilds($id){

        $result = [];
        $model = Branch::where('kias_parent_id', $id)->get();
        foreach($model as $branchData){
            if(count($branchData->childs)){
                $result = array_merge($result,$this->getChilds($branchData->kias_id));
            }else{
                array_push($result, $branchData->kias_id);
            }
        }
        return $result;
    }

    public function addItem(Request $request){
        $model = new StoreItem();
        foreach ($request->all() as $key => $value){
            $model->$key = $value;
        }
        $model->updated_by = Auth::user()->ISN;
        try{
            $model->save();
        }catch (\Exception $ex){
            return response()
                ->json([
                    'success' => false,
                    'error' => $ex->getMessage(),
                ])
                ->withCallback(
                    $request->input('callback')
                );
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
            ])
            ->withCallback(
                $request->input('callback')
            );
    }

}
