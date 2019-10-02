<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadDocs extends Model
{
    public function checkUrl(){
        if($this->url === 'save' || (sizeof(self::where('url', $this->url)->get()) !== 0)){
            return false;
        }
        return true;
    }
}
