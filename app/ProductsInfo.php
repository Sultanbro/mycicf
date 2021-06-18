<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class ProductsInfo extends Model
{
    public function saveImage($image){
        $fileName = time().'.'.$image->extension();
        $content = $image->get();
        Storage::disk('local')->put("/public/menu/{$fileName}", $content);
        $this->icon_url = "/storage/menu/{$fileName}";
    }

    public function getParent(){
        return $this->parent_id === 0 ? 'Не указано' : (self::findOrFail($this->parent_id)->label ?? 'DELETED');
    }
    public function saveWord($word){
        $fileName = time().'.'.$word->extension();
        $word = $word->get();
        Storage::disk('local')->put("/public/menu/{$fileName}", $word);
        $this->description = "/storage/menu/{$fileName}";
        $this->documents = "/storage/menu/{$fileName}";
    }

    public function childs() {
        return $this->hasMany('App\ProductsInfo','parent_id','id') ;
    }

    public function count($columns = '*')
    {
        return (int) $this->aggregate(__FUNCTION__, Arr::wrap($columns));
    }

    /*public function docFile(){
        return $this->hasMany('App\DocFile', 'product_info_id', 'id');
    }*/

}

