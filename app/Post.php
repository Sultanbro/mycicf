<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
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

    public function getComments(){
        $comments = [];

        $model = Comment::where('post_id', $this->id)->get();

        foreach ($model as $comment) {
            array_push($comments, [
                'commentText' => $comment->text,
                'userISN' => $comment->user_isn,
                'commentId' => $comment->id,
                'fullname' => (new User)->getFullName($comment->user_isn),
                'date' => date('d.m.Y H:i', strtotime($comment->created_at)),
            ]);
        }
        return $comments;
    }

    public function getImage(){
        $file = Storage::disk('local')->files("public/post_files/$this->id/images");
        foreach ($file as $key => $item){
            $file[$key] = "/storage".substr($item,6);
        }
        return $file;
    }

    public function getDocuments(){
        $file = Storage::disk('local')->files("public/post_files/$this->id/documents");
        foreach ($file as $key => $item){
            $fileName = explode('/', $item);
            $fileName = end($fileName);
            $file[$key] = [
                'link' => "/storage".substr($item,6),
                'type' => $this->getTypeOfDocument($fileName),
                'name' => $fileName,
                ];
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

    public function getTypeOfDocument($doc_name){
        $ext = explode('.', $doc_name);
        $ext = end($ext);
        switch ($ext){
            case 'doc' :
                return 'fa-file-word text-primary';
                break;
            case 'docx' :
                return 'fa-file-word text-primary';
                break;
            case 'dot' :
                return 'fa-file-word text-primary';
                break;
            case 'xls' :
                return 'fa-file-excel text-success';
                break;
            case 'xlsx' :
                return 'fa-file-excel text-success';
                break;
            case 'pdf' :
                return 'fa-file-pdf text-danger';
                break;
            case 'ppt' :
                return 'fa-file-powerpoint text-warning';
                break;
            case 'pptx' :
                return 'fa-file-powerpoint text-warning';
                break;
            case 'rar' :
                return 'fa-file-archive text-info';
                break;
            case 'zip' :
                return 'fa-file-archive text-info';
                break;
            default :
                return 'fa-file-o';
        }
    }
}
