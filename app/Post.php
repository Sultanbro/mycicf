<?php

namespace App;

use App\Http\Controllers\NotificationController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * App\Post
 *
 * @property int $id
 * @property int $user_isn
 * @property string $post_text
 * @property int $pinned
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int $from_kias
 *
 * @property int $likes_count
 * @property bool $is_edited
 *
 * @method static bool|null forceDelete()
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static \Illuminate\Database\Query\Builder|Post onlyTrashed()
 * @method static Builder|Post query()
 * @method static bool|null restore()
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDeletedAt($value)
 * @method static Builder|Post whereFromKias($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePinned($value)
 * @method static Builder|Post wherePostText($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserIsn($value)
 * @method static \Illuminate\Database\Query\Builder|Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Post withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;

    const NEW_POST = 'new';
    const EDITED_POST = 'edit';
    const LIKED_POST = 'like';
    const PINNED_POST = 'pinned';
    const DELETED_POST = 'deleted';
    const COMMENDTED_POST = 'commented';

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getPoll($post_id) {
        $question = Question::where('post_id', $post_id)->first();
        $question_id = $question['id'];
        $question_value = $question['question'];
        $answers = Answer::where('question_id', $question_id)->get();

        $post_answers = [];
        foreach ($answers as $answer) {
            array_push($post_answers, [
                "answer_id" => $answer['id'],
                "answer_title" => $answer['value'],
                "answer_votes" => $this->getAnswerVotes($answer['id']),
                "checked" => false
            ]);
        }
        $post_poll = [
            "question_id" => $question_id,
            "question_title" => $question_value,
            "total_votes" => $this->getTotalVotes($question_id),
            "answers" => $post_answers,
        ];
        return $post_poll;
    }


    private function getAnswerVotes($answer_id) {
        $count = UserAnswer::where('answer_id', $answer_id)->count();
        return $count;
    }

    private function getTotalVotes($question_id) {
        $count = UserAnswer::where('question_id', $question_id)->count();
        return $count;
    }

    public function getIsVoted($isn, $post_id) {
        $question_id = Question::where('post_id', $post_id)
            ->first();
        $model = UserAnswer::where('question_id', $question_id['id'])
            ->where('user_isn', $isn)->first();
        if($model === null) {
            $is_voted = 0;
        }
        else {
            $is_voted = 1;
        }
        return $is_voted;
    }

    public function setPinned(){
        self::where('pinned', 1)->update([
            'pinned' => 0
            ]);
        $this->pinned = 1;
        $this->save();
    }

    public function getIsEditedAttribute() {
        return $this->created_at != $this->updated_at;
    }

    /**
     * @param $post_id
     * @return bool
     *
     * @deprecated Use $this->is_edited instead
     */
    public function getIsEdited($post_id) {
        $model = self::where('id', $post_id)
                ->first();

        if($model !== null) {
            return $model->created_at != $model->updated_at;
        }
    }

    /**
     * TODO Плохая практика. Лучше использовать relation и with()
     *
     * @return array
     *
     * @deprecated
     */
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

    public function getVideoUrl(){
        $file = Storage::disk('local')->files("public/post_files/$this->id/videos");
        $result = [];
        foreach ($file as $key => $item){
                array_push($result, "/storage".substr($item,6));
        }
        return $result;
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

    /**
     * TODO Возможно здесь лучше использовать события Eloquent
     *
     * https://laravel.com/docs/8.x/eloquent#events
     *
     * @param array $options
     * @return bool|void
     */
    public function save(array $options = []){
        parent::save();
        (new NotificationController())->sendNewPostNotify($this);
    }
}
