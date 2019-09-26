<?php

namespace App\Http\Controllers;

use App\UploadDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentationController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function save(Request $request)
    {
        $table = new UploadDocs();
        $table->url = $request->url;
        if(!$table->checkUrl()){
            throw new \Exception('Такой URL уже существует', '419');
        }
        //TODO substr if 1 char is "/"
        //TODO if string has / raise error
        $text = $request->area3;
        $table->encoded_text = $text;
        $table->only_text = strip_tags($text);
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
}
