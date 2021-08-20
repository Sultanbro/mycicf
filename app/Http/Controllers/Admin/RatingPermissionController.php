<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Dictionary;
use App\Http\Controllers\Controller;
use App\Library\Services\KiasServiceInterface;
use App\RatingPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingPermissionController extends Controller
{
    public function index()
    {
        return view('rating.list');
    }

    public function getKuratorUsers(Request $request){
        $success = true;
        $error = '';
        $result = [];

        $list = RatingPermission::all();
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
        return view('rating.new');
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
            $kurator = new RatingPermission();
            $kurator->user_isn = $user;
            //$kurator->permission_id = $role;
            $kurator->dept_isn = $request->dept_isn;
            $kurator->type = 'rating';
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

    public function deleteById(RatingPermissionController $kurators){
        $kurators->delete();
    }

    public function getBranchData(Request $request)
    {
        $headDept = RatingPermission::where('user_isn', Auth::user()->ISN)->first()->dept_isn ?? Auth::user()->level ?? Auth::user()->ISN;
        $headData = Branch::where('kias_id', $headDept)->first();
        $result = [];
        if(count($headData->childs)){
            array_push($result, [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getChild($headData->kias_id),
            ]);
        }else{
            array_push($result, [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ]);
        }
        $responseData = [
            'result' => $result,
            'value' => $headDept,
        ];
        return response()->json($responseData)->withCallback($request->input('callback'));
    }

    public function getChild($parent){
        $result = [];
        $headData = Branch::where('kias_parent_id', $parent)->get();
        foreach ($headData as $data){
            if(count($data->childs)){
                array_push($result, [
                    'id' => $data->kias_id,
                    'label' => $data->fullname,
                    'children' => $this->getChild($data->kias_id),
                ]);
            }else{
                array_push($result, [
                    'id' => $data->kias_id,
                    'label' => $data->fullname,
                ]);
            }
        }
        return $result;
    }
}
