<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Dictionary;
use App\Kurators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KuratorController extends Controller
{
    public function kuratorView(){
        return view('statistics.list');
    }

    public function getKuratorUsers(Request $request){
        $success = true;
        $error = '';
        $result = [];
        $list = Kurators::all();
        foreach ($list as $item){
            array_push($result, [
                'id' => $item->id,
                'name' => (new Branch())->getUserName($item->user_isn),
                'role' => $item->type, //$item->getKuratorLabel(),
                'date' => date('d.m.Y H:i:s', strtotime($item->created_at)),
                'changer' => (new Branch())->getUserName($item->changer),
            ]);
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'data' => $result,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function newUserView(){
        return view('statistics.new');
    }

    public function getKurators(Request $request){
        $success = true;
        $error = '';
        $result = [];
        $list = Dictionary::where('type', Dictionary::TYPE_ROLE)->get();
        foreach ($list as $item){
            array_push($result, [
                'id' => $item->id,
                'name' => $item->name,
            ]);
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'data' => $result,
        ];
        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function newUser(Request $request){
        $success = true;
        $error = '';
        $user = $request->user;
        $role = $request->role;
        if(!Auth::check()){
            $success = false;
            $error = 'Авторизуйтесь';
        }
        try{
            $kurator = new Kurators();
            $kurator->user_isn = $user;
            //$kurator->permission_id = $role;
            $kurator->dept_isn = $request->dept_isn;
            $kurator->type = 'statistics';
            $kurator->active = 1;
            $kurator->save();
        }catch (\Exception $ex){
            $success = false;
            $error = $ex->getMessage();
        }
        $result = [
            'success' => $success,
            'error' => $error,
        ];

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function deleteById(Kurators $kurators){
        $kurators->delete();
    }
}
