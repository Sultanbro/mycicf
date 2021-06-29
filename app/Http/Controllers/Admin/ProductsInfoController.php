<?php

namespace App\Http\Controllers\Admin;

use App\PdfFiles;
use App\ProductsInfo;
use App\SvgFiles;
use App\UploadDocs;
use App\DocFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

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
    public function menuList(){
        return view('wnd.list.menu');
    }
    public function descriptionList(){
        return view('wnd.list.description');
    }
    public function getMenuList(Request $request){
        $result = [];
        $productsInfos = ProductsInfo::with('childs')->get();
        foreach ($productsInfos as $item) {
            if($item->childs->count() === 0){
//                $parentName = $item->getParent() !== 'Не указано' ? $item->getParent() . ' -> ' : '';
                array_push($result, [
                    'id' => $item->id,
                    'label' => $item->label,
                    'parent' => $item->getParent(),
                    'url' => $item->url,
                    'child_count' => $item->childs->count(),
                    'icon_url' => $item->icon_url,
                ]);
            }
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

    public function getDescriptionList(Request  $request){
//        foreach (ProductsInfo::all() as $item) {
//            array_push($result, [
//                'id' => $item->id,
//                'label' => $item->label,
//                'parent' => $item->getParent(),
//                'description' => $item->description,
//                'documents' => $item->documents,
//                'franshiza' => $item->franshiza,
//            ]);
//        }
        $result = [];
        $productsInfos = ProductsInfo::with('childs')->get();
        foreach ($productsInfos as $item) {
            if($item->childs->count() === 0){
                $parentName = $item->getParent() !== 'Не указано' ? $item->getParent() . ' -> ' : '';
                array_push($result, [
                    'id' => $item->id,
                    'label' => $parentName . $item->label,
                    'parent' => $item->getParent(),
                    'description' => $item->description,
                    'child_count' => $item->childs->count(),
                    'documents' => $item->documents,
                    'franshiza' => $item->franshiza,
                ]);
            }
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

    public function deleteMenu(Request $request){
        dd($request->id);
    }
    public function getEditMenu(Request $request){
        $res = DocFile::where('product_info_id', $request->id)->get();
        $result =[];
        foreach($res as $prod){
            array_push($result, [
                'id' => $prod->id,
                'product_id' => $prod->product_info_id,
                'docfile' => $prod->docfile,
                'profile' => $prod->profile
            ]);
        }
        return response()->json([
            'result' => $result
        ]);
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
    public function savePdf(Request $request){
//        dd($request);
//        dd($request->file);
        $file = $request->file;
//        dd($file->getClientOriginalName());
        $extension = $file->extension();
//        dd($extension);
//        if($extension === 'pdf' || $extension === 'jpeg' || $extension === 'jpg' || $extension === 'ppt' || $extension === 'pps' || $extension === 'htm'
//            || $extension === 'html' || $extension === 'png'){
            $content = file_get_contents($file);
//        dd($content);
//        $fileName = time().'.'.$extension;
            $fileName = $file->getClientOriginalName();
            $url = "/public/productInfo/{$fileName}";
            Storage::disk('local')->put($url, $content);
//        dd($url);
            return response()
                ->json([
                    'success' => true,
                    'error' => '',
//                'url' => "/documentation/pdf_{$id}"
                ])
                ->withCallback(
                    $request->input('callback')
                );
//        }else{
//            return response()
//                ->json([
//                    'success' => false,
//                    'error' => 'Загрузите файл в другом формате',
//                ]);
//        }
    }

    public function saveFile(Request $request)
    {
//        dd($request);
        $profile = "/storage/productInfo/".''.$request->doc['profile'];
//        dd($profile);
//        $url = "/storage/pdf/{$profile}";
        $table = new DocFile();

        $table->profile = $profile;
        $table->docfile = $request->doc['docfile'];
        $table->product_info_id = $request->doc['product_id'];
        $table->save();
//        dd($table);
//        $id = $table->id;
        $doc = DocFile::where('profile', $profile)->first();

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'id' => $doc->id,
            ]);
    }
    public function saveDescription(Request $request){
        $table = new ProductsInfo();
        $table = ProductsInfo::where('id', $request->id)->first();
//        dd($table);
        $table->description = $request->description;
        $table->documents = $request->documents;
        $table->franshiza = $request->franshiza;
        if(!$table->save()){
            return response()->json([
                'success' => false,
                'error' => 'Не удалось сохранить']);
        } else {
            $table->save();
            return response()->json([
                'success' => true,
                'error' => '']);
        }
    }

    public function deleteItem(Request $request){
        $profile = $request->doc['profile'];
        $id = $request->doc['id'];
//        dd($id);
        $doc = explode("/", $request->doc['profile']);
        $filename = $doc[count($doc)-1];
        if($id !== null){
            $file = storage_path('app/public/productInfo/'.$filename);
            $error = '';
            $docfile = DocFile::where('id', $id)->first();
            if(!file_exists($file)){
                return response()->json([
                    'success' => false,
                    'error' => $error.'Документ уже удалено либо не найдено в директорий',
                ]);
            } elseif(!file_exists($docfile)){
                return response()->json([
                    'success' => false,
                    'error' => $error.'Документ уже удалено либо не найдено в базе',
                ]);
            }else {

            }
            unlink($file);
            $docfile->delete();
            return response()
                ->json([
                    'success' => true,
                    'error' => ''.'2',
                ]);
//            Storage::delete('app/public/productInfo/'.$filename);
        }else{
//            unlink(storage_path('app/public/productInfo/'.$profile));
//            $file_path = 'C:/Users/DZhanysbai/domains/my.cic.kz/storage/app/public/productInfo/'. $profile;
//            unlink($file_path);
//            File::Delete('/storage/app/public/productInfo/'.$profile);
            $file = storage_path('app/public/productInfo/'.$filename);
            $error = '';
            if(file_exists($file)){
                Storage::delete('app/public/productInfo/'.$filename);
                return response()
                    ->json([
                        'success' => true,
                        'error' => ''.'3',
                    ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => $error.'Документ уже удалено либо не найдено в директории',
                ]);
            }

        }

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
                'dopinform' => $item->dopinform,
                'docfile' => $item->docfile,
                'profile' => $item->profile,
                'franzhiza' => $item->franshiza,
                'childs' => [],
                'opened' => false,

            ]);
        }
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
                'profile' => $prod->profile
            ]);
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
