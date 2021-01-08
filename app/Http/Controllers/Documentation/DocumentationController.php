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
            $apidocs = $this->getDocs($request->id);

            return view('documentation.pages.main.index')->with('categories', $categories)->with('apidocs', $apidocs);
        }
        elseif($request->type === self::KIAS_DOCS_TYPE) {
            $kiasdocs = $this->getDocs($request->id);

            return view('documentation.pages.main.index')->with('categories', $categories)->with('kiasdocs', $kiasdocs);
        }
        else {
            return view('documentation.pages.main.index')->with('categories', $categories);
        }
    }

    public function getDocs($id)
    {
        $docs = DocMethodDescription::where('doc_category_id', $id)->first();

        if($docs) {
            return json_decode($docs->documentation);
        }
        else
            return [];
    }

    public function create(Request $request)
    {
        $category = new DocMethodCategory();
        $category->title = $request->categoryName;
        $category->category = $request->type;

        if($category->save())
        {
            $docs = array(
                'docs'   => $request->docs,
                'errors' => $request->errors
            );

            $documentation = new DocMethodDescription();
            $documentation->title = $request->categoryName;
            $documentation->documentation = json_encode($docs);
            $documentation->doc_category_id = $category->id;

            if(!$documentation->save())
                throw new \Exception("Произошла ошибка при сохранении данных", 400);
            else
                return response()->json([
                    'success' => true,
                    'code'    => 200
                ]);
        }
        else
            throw new \Exception("Произошла ошибка при сохранении данных", 400);

    }
}
