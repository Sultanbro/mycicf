<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Dictionary;
use App\Permissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function dictiView(){
        return view('dictionary.list');
    }

    public function getDictiList(Request $request){
        $success = true;
        $error = '';
        $result = [];
        $list = Dictionary::where('type', Dictionary::TYPE_ROLE)->get();
        foreach ($list as $item){
            array_push($result, [
                'id' => $item->id,
                'name' => $item->name,
                'created' => date('d.m.Y H:i:s', strtotime($item->created_at))
            ]);
        }
        $result = [
            'success' => $success,
            'error' => $error,
            'data' => $result,
        ];
        return response()->json($result)->withCallback($request->input('callback'));

    }

    public function permissionView(){
        return view('role.list');
    }

    public function getPermittedUsers(Request $request){
        $success = true;
        $error = '';
        $result = [];
        $list = Permissions::all();
        foreach ($list as $item){
            array_push($result, [
                'id' => $item->id,
                'name' => (new Branch())->getUserName($item->user_isn),
                'role' => $item->getPermissionLabel(),
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
        return view('role.new');
    }

    public function getRoles(Request $request){
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
            $permission = new Permissions();
            $permission->user_isn = $user;
            $permission->permission_id = $role;
            $permission->save();
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
}
