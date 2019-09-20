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
            echo "Такой URL уже имеется в базе данных\n";
            exit;
        }

        try {
            $filename = time() . '_' . $file_url->getClientOriginalName();
            $file_url->move(public_path('images/documentation'), $filename);

            $model = new Documentation();
            $model->file_url = $filename;
            $model->script = $script;
            $model->url = $url;
            if($model->save()){
                echo "Все данные успешно добавлены в базу\n";
            }
        }catch (\Exception $ex){
            echo "Ошибка {$ex->getMessage()}\n";
        }
    }


    public function test() {
        return view('qwerty');
    }

    public function getUrl($url){
        $items = Documentation::where('url', $url)->first();
        if($items === null){
            abort(404, 'Запрашиваемая вами страница не найдена');
        }
        $result = [
            'js' => "<script>{$items->script}</script>",
            'SVG' => "images/documentation/{$items->file_url}",
        ];

        return view('documentation', compact('result'));
    }
}
