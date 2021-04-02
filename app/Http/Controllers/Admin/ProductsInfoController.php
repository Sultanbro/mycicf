<?php

namespace App\Http\Controllers\Admin;

use App\PdfFiles;
use App\ProductsInfo;
use App\SvgFiles;
use App\UploadDocs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsInfoController extends Controller
{
    public $exceptions = ['.',',',':','/',' '];

    public function orgStructure(){
        return view('productsinfo.load.structure');
    }
    public function loadSvg(){
        return view('productsinfo.load.svg');
    }
    public function loadWord(){
        return view('productsinfo.load.word');
    }
    public function loadImage(){
        return view('productsinfo.load.image');
    }
    public function loadPdf(){
        return view('productsinfo.load.pdf');
    }
    public function menu(){
        return view('productsinfo.load.menu');
    }
    public function svgList(){
        return view('productsinfo.list.svg');
    }
    public function wordList(){
        return view('productsinfo.list.word');
    }
    public function menuList(){
        return view('productsinfo.list.menu');
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
        $file = $request->word;
        $extension = $file->extension();
        $content = $file->get();
        $fileName = time().'.'.$extension;
        Storage::disk('local')->put("/public/word/{$fileName}", $content);
        $url = "/storage/word/{$fileName}";
        foreach ($this->exceptions as $except){
            if(strpos($table->url,$except)){
                abort(419, 'Использование символов ".";",";":";"/" и пробела запрещено');
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
        $table->file_url = $url;
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
    public function savePdf(Request $request){
        $file = $request->file;
        $extension = $file->extension();
        $content = $file->get();
        $fileName = time().'.'.$extension;
        Storage::disk('local')->put("/public/pdf/{$fileName}", $content);
        $url = "/storage/pdf/{$fileName}";
        $pdfTable = new PdfFiles();
        $pdfTable->file_url = $url;
        $pdfTable->save();
        $id = $pdfTable->id;

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'url' => "/productsinfo/pdf_{$id}"
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function saveMenu(Request $request){
        $model = new ProductsInfo();
        try {
            foreach ($request->all() as $key => $value) {
             //   print $key.'-'.$value .'===';
                if($key !== 'file') {
                    if($key === 'parent_id') {
                        $model->$key =  $value === 'null' || $value === '' ? 0 : $value;

                    } else {
                        $model->$key =  $value;
                    }
                }
            }
            if($request->file != "null") {
                $model->saveImage($request->file);
            }
            if($request->file != "null"){
                $model->saveWord($request->file);
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
        foreach (ProductsInfo::all() as $item) {
            array_push($result, [
                'id' => $item->id,
                'label' => $item->label,
                'parent' => $item->getParent(),
                'url' => $item->url,
                'icon_url' => $item->icon_url,
                'description' => $item->description,
                'documents' => $item->documents,

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
        $model = ProductsInfo::all();
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

    public function deleteSvg(Request $request){
        SvgFiles::find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function deleteWord(Request $request){
        UploadDocs::find($request->id)->delete();
        return response()->json([
            'success' => true
        ]);
    }

    public function deleteMenu(Request $request){
        ProductsInfo::find($request->id)->delete();
        $this->deleteChilds($request->id);
        return response()->json([
            'success' => true
        ]);
    }

    public function deleteChilds($id){
        foreach (ProductsInfo::where('parent_id', $id)->get() as $deleteModel){
            $this->deleteChilds($deleteModel->id);
            $deleteModel->delete();
        }
    }
}
