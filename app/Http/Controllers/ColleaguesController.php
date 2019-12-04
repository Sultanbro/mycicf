<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class ColleaguesController extends Controller {

    public function search(Request $request) {
        try {
            $value = $request->searchText;

            if($value !== null) {
                $model = Branch::where('fullname', 'LIKE', '%' . $value . '%')->get();
                $search_result = [];

                foreach($model as $item) {
                    array_push($search_result, [
                        'fullname' => $item->fullname,
                        'isn' => $item->kias_id,
                    ]);
                }

                if($request->id !== null) {
                    $branch = Branch::where('kias_id', $request->id)->get();
                    if(count($branch->childs)) {

                    }
                }

                dd($search_result);

            }
            else return 0;
        } catch(Exception $e) {
            $e->getMessage();
        }
    }

    public function getBranchData() {

    }

    private function getChild($parent_id) {

    }

    public function index() {
        return view('colleagues');
    }
}
