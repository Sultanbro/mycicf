<?php

namespace App\Http\Controllers\Documentation;

use App\DocMethodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index(Request $request)
    {
//        var_dump($request->type);
////        var_dump($request->getRequestUri());

        $categories = (new DocMethodCategory())->getCategories();

        return view('documentation.pages.main.index')->with('categories', $categories);
    }
}
