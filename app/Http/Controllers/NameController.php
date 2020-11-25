<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\Item;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function getItemsList(Request $request) {

        $items = DocumentationStructure::where('parent_id', $request->parentId)->get();

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

    public function getView() {
        return view('name');
    }
    public function getRecruiting() {
        return view('recruiting');
    }
}
