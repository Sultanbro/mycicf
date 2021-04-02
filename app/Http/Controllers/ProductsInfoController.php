<?php

namespace App\Http\Controllers;

use App\DocumentationStructure;
use App\PdfFiles;
use App\ProductsInfo;
use App\SvgFiles;
use App\UploadDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getByUrl($url){
        if(substr($url, 0, 4) === 'pdf_'){
            $id = substr($url, 4);
            $data = PdfFiles::find($id);
            if(null !== $data){
//                dd($data->file_url);
                return \redirect($data->file_url);
            }
        }
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

    public function getItemsList(Request $request) {
        $items = ProductsInfo::where('parent_id', $request->parentId)->get();
        $result = [];
        foreach ($items as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'url' => $item->url,
                'icon_url' => $item->icon_url,
                'description' => $item->description,
                'documents' => $item->documents,
                'childs' => [],
                'opened' => false
            ]);
        }
        return $result;
    }

    public function getView() {
        return view('productsinfo');
    }
    public function showNameDocuments(Request $request)
    {
        //$c = ProductsInfo::select('docfile')->where('$request->')
    }
}
