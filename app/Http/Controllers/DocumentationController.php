<?php

namespace App\Http\Controllers;

use App\UploadDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentationController extends Controller
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
                throw new \Exception('Использование символов ".";",";":";"/" и пробела запрещено', 419);
            }
        }
        if(!$table->checkUrl()){
            throw new \Exception('Такой URL уже существует', '419');
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
        if(($page = UploadDocs::where('url', $url)->first()) === null){
            throw new \Exception('Данная страница не найдена', 404);
        }
        return view('documentation_page', compact('page'));
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
}