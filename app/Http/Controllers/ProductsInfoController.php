<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\PdfFiles;
use App\ProductsInfo;
use App\SvgFiles;
use App\UploadDocs;
use App\DocFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsInfoController extends Controller
{
    public $exceptions = ['.',',',':','/',' '];
    public function admin()
    {
        return view('welcome');
    }

    public function index(){
        ini_set ('memory_limit', '2048M');
        return view('svg');
    }

    public function save(Request $request)
    {
        $table = new UploadDocs();
        $table->url = $request->url;
        foreach ($this->exceptions as $except){
            if(strpos($table->url,$except)){
                abort(419, 'Использование символов ".";",";":";"/" и пробела запрещено');
            }
        }
        if(!$table->checkUrl()){
            abort(419, 'Такой URL уже существует');
        }
        //TODO substr if 1 char is "/"
        //TODO if string has / raise error
        $text = $request->area3;
        $table->encoded_text = $text;
        $table->only_text = str_replace("&nbsp;", ' ', strip_tags($text));
        $table->user_isn = Auth::user()->ISN;
        $table->title = $request->title;
        $table->save();
    }

    public function getByUrl(Request $request){
        $files = Storage::files($directory);
//        dd($request);
//        return response()->file($request->url);
//        if(substr($url, 0, 4) === 'pdf'){
            $id = substr($url, 4);
            $data = PdfFiles::find($id);
            if(null !== $data){
//                dd($data->file_url);
                return \redirect($data->profile);
            }
//        }
        if(($page = UploadDocs::where('url', $url)->first())){
            return view('productsinfo_page', compact('page'));
        }elseif(($page = SvgFiles::where('url', $url)->first())){
            return view('svg_page', compact('page'));
        }else{
            throw new \Exception('Запрашиваемая страница не найдена', 404);
        }
    }

    public function search(Request $request){
        $text = $request->searchText;
        $result = [];
        if($request->type == "1"){
            $sqlRes = UploadDocs::selectRaw("position(? in only_text) as pos, only_text, url, title", array($text))
                ->whereRaw("MATCH (only_text) AGAINST (? IN BOOLEAN MODE)", array($text))
                ->orderByRaw("MATCH (only_text) AGAINST ('{$text}' IN BOOLEAN MODE)", 'DESC')
                ->get();
            foreach ($sqlRes as $sql){
                if((int)$sql->pos < 50){
                    $resText = mb_substr((string)$sql->only_text,0, (100+ mb_strlen($text)));
                }else{
                    $resText = mb_substr((string)$sql->only_text,$sql->pos-50, (100+ mb_strlen($text)));
                }
                array_push($result, [
                    'url' => $sql->url,
                    'title' => $sql->title,
                    'text' => "...{$resText}...",
                ]);
            }

        }else if($request->type == "2"){
            $sqlRes = UploadDocs::selectRaw('url, title')
                ->whereRaw("title like '%{$text}%'")
                ->get();
            foreach($sqlRes as $item){
                array_push($result, [
                    'url' => $item->url,
                    'title' => $item->title,
                    'text' => ''
                ]);
            }
        }
        return $result;
    }

    public function getItemsList(Request $request){
        //ini_set ('memory_limit', '2048M');
        $result = [];
//        dd(auth()->user()->ISN);
        $items = ProductsInfo::where('parent_id', $request->parentId)->get();
        foreach($items as $item)
            array_push($result, [
                'id' => $item['id'],
                'label' => $item['label'],
                'parent_id' => $item['parent_id'],
                'children' => $this->getItemsListChild($item),
            ]);
        return $result;

    }


    public function getItemsListChild($item) {
        $items = ProductsInfo::where('parent_id', $item->id)->get();
        $result = [];
        foreach ($items as $item) {
            if (count(ProductsInfo::where('parent_id', $item['id'])->get()) === 0) {
                array_push($result, [
                    'id' => $item->id,
                    'parent_id' => $item->parent_id,
                    'label' => $item->label,
                    'url' => $item->url,
                    'icon_url' => $item->icon_url,
                    'description' => $item->description,
                    'documents' => $item->documents,
                    'dopinform' => $item->dopinform,
                    'docfile' => $item->docfile,
                    'profile' => $item->profile,
                    'franzhiza' => $item->franshiza,
                    'childs' => [],
                    'opened' => false,
                ]);
            } else {
                array_push($result, [
                    'id' => $item->id,
                    'parent_id' => $item->parent_id,
                    'label' => $item->label,
                    'url' => $item->url,
                    'icon_url' => $item->icon_url,
                    'description' => $item->description,
                    'documents' => $item->documents,
                    'dopinform' => $item->dopinform,
                    'docfile' => $item->docfile,
                    'profile' => $item->profile,
                    'franzhiza' => $item->franshiza,
                    'childs' => $this->getItemsListChild($item),
                    'opened' => false,
                ]);
            }
        }

//        foreach ($items as $item) {
//            array_push($result, [
//                'id' => $item->id,
//                'parent_id' => $item->parent_id,
//                'label' => $item->label,
//                'url' => $item->url,
//                'icon_url' => $item->icon_url,
//                'description' => $item->description,
//                'documents' => $item->documents,
//                'dopinform' => $item->dopinform,
//                'docfile' => $item->docfile,
//                'profile' => $item->profile,
//                'franzhiza' => $item->franshiza,
//                'childs' => $item->childs,
//                'opened' => false,
////                'isActiveId' => $request->parentId,
//            ]);
//        }
        return $result;
    }
    public function getItemsFirst(Request $request){
        $items = ProductsInfo::where('parent_id', $request->parentId)->first();
        $result = [];
        foreach ($items as $item) {
            array_push($result, [
                'label' => $item->label,
            ]);
        }
        return $result;
    }

    public function getView() {
        return view('productsinfo');
    }
    public function showNameDocuments(Request $request){
        $res = DocFile::where('product_info_id', $request->productInfoId)->get();
        $result =[];
        foreach($res as $prod){
            array_push($result, [
//                'id' => $prod->id,
//                'product_id' => $prod->product_info_id,
                'docfile' => $prod->docfile,
                'profile' => $prod->profile,
                'product_info_id' => $prod->product_info_id,
            ]);
        }
        if($result == null){
            $result = 'Нет документа';
        }
        return response()->json([
            'result' => $result
        ]);
    }

    public function searchName(Request $request){
            $nameDoc = DocFile::where('docfile', 'like', "%". $request->searchId . "%")->get();
            if(count($nameDoc) !==0){
                $success = true;
                $result= [];
                foreach($nameDoc as $name){
                    array_push($result, [
                        'docfile' => $name->docfile,
                        'profile' => $name->profile
                    ]);
                }
                return response()->json([
                    'success' => $success,
                    'result' => $result
                ]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'result' => 'Ничего не найдено'
                ]);
            }
    }





}
