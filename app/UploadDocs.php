<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UploadDocs
 * @package App
 * @property $id int
 * @property $title string
 * @property $encoded_text string
 * @property $only_text string
 * @property $url string
 */
class UploadDocs extends Model
{
    public function checkUrl(){
        if($this->url === 'save' || (sizeof(self::where('url', $this->url)->get()) !== 0)){
            return false;
        }
        return true;
    }
}
