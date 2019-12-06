<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class ColleaguesController extends Controller {

    public function search(Request $request) {
        $result = [];
        $searchText = $request->searchText;
        $parentId = isset($request->parentId) ? $request->parentId : 50;
        $model = Branch::where('fullname', 'like', "%$searchText%")
            ->whereIn('kias_parent_id', $this->getChilds($parentId))
            ->get();
        foreach ($model as $user){
            if(!count($user->childs)) {
                array_push($result, [
                    'name' => $user->fullname,
                    'isn' => $user->kias_id,
                    'department' => (new Branch())->getUserName($user->kias_parent_id),
                    'imageUrl' => $this->getImageUrl($user->kias_id),
                    'duty' => $user->duty,
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'error' => '',
            'list' => $result
        ]);
    }

    public function index() {
        return view('colleagues');
    }

    public function getChilds($parentId){
        $result = [];
        $model = Branch::where('kias_id', $parentId)->first();
        if(count($model->childs)){
            array_push($result, $parentId);
            $result = array_merge($result,$this->getChildsOfChild($parentId));
        }
        return $result;
    }

    public function getChildsOfChild($parentId){
        $result = [];
        $model = Branch::where('kias_parent_id', $parentId)->get();
        foreach ($model as $data){
            if(count($data->childs)){
                array_push($result, $data->kias_id);
                $result = array_merge($result, $this->getChildsOfChild($data->kias_id));
            }
        }
        return $result;
    }

    public function getImageUrl($isn){
        if(file_exists(public_path()."/storage/images/employee/$isn.png")){
            return "/storage/images/employee/$isn.png";
        }else{
            return "/images/avatar.png";
        }
    }

    public function showPageByIsn($ISN){
        $fullname = (new Branch())->getUserName($ISN);
        return view('colleagues.dossier', compact('ISN'), compact('fullname'));
    }

    public function showRatingByIsn($ISN){
        $fullname = (new Branch())->getUserName($ISN);
        return view('colleagues.rating', compact('ISN'), compact('fullname'));
    }

    public function showMotivationByIsn($ISN){
        $fullname = (new Branch())->getUserName($ISN);
        return view('colleagues.motivation', compact('ISN'), compact('fullname'));
    }

    public function showReportByIsn($ISN){
        $fullname = (new Branch())->getUserName($ISN);
        return view('colleagues.report', compact('ISN'), compact('fullname'));
    }

}
