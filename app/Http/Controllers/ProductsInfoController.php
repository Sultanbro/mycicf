<?php

namespace App\Http\Controllers;

use App\ProductsInfo;
use Illuminate\Http\Request;

class ProductsInfoController extends Controller
{
    public function index(){
        return view('products_info');
    }

    public function getItemsList(Request $request) {

        $items = ProductsInfo::where('parent_id', $request->parentId)->get();

        $result = [];

        foreach ($items as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'url' => $item->url,
                'icon_url' => $item->icon_url,
                'childs' => [],
                'opened' => false
            ]);
        }
        return $result;
    }
}
