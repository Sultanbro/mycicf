<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
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
}
