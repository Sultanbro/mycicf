<?php

namespace App\Http\Controllers\Admin;

use App\SvgFiles;
use App\UploadDocs;
use App\DocumentationStructure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public $exceptions = ['.',',',':','/',' '];

    public function orgStructure(){
        return view('wnd.load.structure');
    }
    public function loadSvg(){
        return view('wnd.load.svg');
    }
    public function loadWord(){
        return view('wnd.load.word');
    }
    public function loadImage(){
        return view('wnd.load.image');
    }
    public function menu(){
        return view('wnd.load.menu');
    }
    public function svgList(){
        return view('wnd.list.svg');
    }
    public function wordList(){
        return view('wnd.list.word');
    }
    public function menuList(){
        return view('wnd.list.menu');
    }
    public function saveStructure(Request $request){
        $file = $request->file;
        $contents = $file->get();
        $ext = $file->extension();
        $fileName = 'org_structure';
        $filePath = "orgStructure/{$fileName}.{$ext}";
        Storage::disk('local')->put("/public/{$filePath}", $contents);
        return response()
            ->json([
                'success' => true,
                'error' => ''
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function saveSvg(Request $request){
        try{
            $svg = new SvgFiles();
            foreach ($request->all() as $key => $value) {
                $svg->$key = $value;
            }
            $svg->save();
        }
        catch (\Exception $ex) {
            return response()
                ->json([
                    'error' => $ex->getMessage(),
                    'success' => false
                ])
                ->withCallback(
                    $request->input('callback')
                );
        }
        return response()
            ->json([
                'error' => '',
                'success' => true
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function saveWord(Request $request){
        $table = new UploadDocs();
        $table->url = $request->url;
        foreach ($this->exceptions as $except){
            if(strpos($table->url,$except)){
                throw new \Exception('Использование символов ".";",";":";"/" и пробела запрещено', 419);
            }
        }
        if(!$table->checkUrl()){
            throw new \Exception('Такой URL уже существует', 419);
        }
        $text = $request->area3;
        $table->encoded_text = $text;
        $table->only_text = str_replace("&nbsp;", ' ', strip_tags($text));
        $table->user_isn = Auth::user()->ISN;
        $table->title = $request->title;
        $table->save();
        return redirect('/');
    }
    public function saveImage(Request $request){
        $image = $request->file;
        $extension = $image->extension();
        $content = $image->get();
        $fileName = time().'.'.$extension;
        Storage::disk('local')->put("/public/image/{$fileName}", $content);
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'url' => "/storage/image/{$fileName}"
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function saveMenu(Request $request){
        $model = new DocumentationStructure();
        try {
            foreach ($request->all() as $key => $value) {
                if($key !== 'file')
                    $model->$key = $value;
            }
            if($request->file != "null") {
                $model->saveImage($request->file);
            }
            $model->save();
        }
        catch (\Exception $ex) {
            return response()
                ->json([
                    'success' => false,
                    'error' => $ex->getMessage()
                ])
                ->withCallback(
                    $request->input('callback')
                );
        }
        return response()
            ->json([
                'success' => true,
                'error' => ''
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function getSvgList(Request $request){
        $files = [];
        foreach (SvgFiles::all() as $file) {
            array_push($files,[
                'id' => $file->id,
                'title' => $file->title,
                'url' => $file->url,
            ]);
        }

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'files' => $files
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function getWordList(Request $request){
        $files = [];
        foreach (UploadDocs::all() as $file) {
            array_push($files, [
                'id' => $file->id,
                'title' => $file->title,
                'url' => $file->url,
            ]);
        }

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'files' => $files
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function getMenuList(Request $request){
        $result = [];
        foreach (DocumentationStructure::all() as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'parent' => $item->getParent(),
                'url' => $item->url,
                'icon_url' => $item->icon_url,

            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'list' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function listMenu(Request $request){
        $model = DocumentationStructure::all();
        $result = [];
        array_push($result, [
            'id' => 0,
            'label' => 'Не указано'
        ]);
        foreach ($model as $item){
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'list' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
}
