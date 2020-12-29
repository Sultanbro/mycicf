<?php

namespace App\Http\Controllers\Documentation;

use App\DocMethodCategory;
use App\DocMethodDescription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    const API_DOCS_TYPE  = 'apidocs';
    const KIAS_DOCS_TYPE = 'kiasdocs';

    public function index(Request $request)
    {
        $categories = (new DocMethodCategory())->getCategories();

        if($request->type === self::API_DOCS_TYPE) {

        }
        elseif($request->type === self::KIAS_DOCS_TYPE) {

        }
        else {
            return view('documentation.pages.main.index')->with('categories', $categories);
        }
    }

    public function getApiDocs($id) {
        $docs = DocMethodDescription::where('category_id', $id);
    }

    public function getKiasDocs($id) {

    }

    public function create(Request $request) {
        dd($request->all());

        $category = new DocMethodCategory();
        $category->title = $request->category_name;
        $category->category = $request->type;

        if($category->save()) {
            $documentation = new DocMethodDescription();
//            $documentation->title = $request->
        }
        else {
            throw new \Exception("Произошла ошибка при сохранении данных", 400);
        }
    }
}
