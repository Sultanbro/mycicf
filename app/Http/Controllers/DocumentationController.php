<?php

namespace App\Http\Controllers;

use App\Documentation;
use App\Library\Services\KiasServiceInterface;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public function postSVG(Request $request, KiasServiceInterface $kias) {
        $file_url = $request->file_url;
        $script = $request->script;
        $url = $request->url;

        $documentations = Documentation::where('url', $request->url)->get();
        if(sizeof($documentations) > 0){
            echo 'Такой URL уже имеется в базе данных';
            exit;
        }

        $filename = time().'_'.$file_url->getClientOriginalName();
        $file_url->move(public_path('images/documentation'), $filename);

        $model = new Documentation();
        $model->file_url = $filename;
        $model->script = $script;
        $model->url = $url;
        $model->save();
    }


    public function test() {
        return view('qwerty');
    }

    public function getUrl($url){
        $items = Documentation::where('url', $url)->findOrFail();
        if($items){

        }
    }
}
