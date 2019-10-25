<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function getItemsList(Request $request) {

        $items = Item::where('parent_id', $request->parentId)->get();

        $result = [];

        foreach ($items as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'childs' => [],
                'opened' => false
            ]);
        }
        return $result;
    }

    public function getView() {
        return view('name');
    }
}
