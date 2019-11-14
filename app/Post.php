<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    const NEW_POST = 'new';
    const EDITED_POST = 'edit';
    const LIKED_POST = 'like';
    const PINNED_POST = 'pinned';
    const DELETED_POST = 'deleted';
    const COMMENDTED_POST = 'commented';

    public function setPinned(){
        self::where('pinned', 1)->update([
            'pinned' => 0
            ]);
        $this->pinned = 1;
        $this->save();
    }

    public function getIsEdited($post_id) {
        $model = self::where('id', $post_id)
                ->first();

        if($model !== null) {
            return $model->created_at != $model->updated_at;
        }
    }

    public function getImage(){
        $file = Storage::disk('local')->files("public/post_files/$this->id");
        foreach ($file as $key => $item){
            $file[$key] = "/storage".substr($item,6);
        }
        return $file;
    }

    public function getText(){
        if($this->getVideo() === null){
            return $this->post_text;
        }else{
            $start = strpos($this->post_text, '<iframe');
            $end = strpos($this->post_text, '</iframe>');
            $text = substr($this->post_text, 0, $start);
            $text .= substr($this->post_text, $end+9);
            return $text;
        }
    }

    public function getVideo(){
        if(strpos($this->post_text,'<iframe') !== false && strpos($this->post_text,'</iframe>')){
            $start = strpos($this->post_text, '<iframe');
            $end = strpos($this->post_text, '</iframe>');
            return(substr($this->post_text, $start, $end-$start+9));
        }
        return null;
    }
}
