<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DocFile extends Model
{
    public function saveWord($word){
        $fileName = time().'.'.$word->extension();
        $word = $word->get();
        Storage::disk('local')->put("/public/menu/{$fileName}", $word);
        $this->description = "/storage/menu/{$fileName}";
        $this->documents = "/storage/menu/{$fileName}";
    }

    public function getParent(){
        return $this->parent_id === 0 ? 'Не указано' : (self::findOrFail($this->parent_id)->label ?? 'DELETED');
    }
    public function productsInfo(){
        return $this->belongsTo('App\ProductsInfo', 'product_info_id', 'id');
    }
}
