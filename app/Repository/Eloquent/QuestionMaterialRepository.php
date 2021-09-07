<?php

namespace App\Repository\Eloquent;

use App\QuestionMaterial;
use App\Repository\QuestionMaterialRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuestionMaterialRepository extends BaseRepository implements QuestionMaterialRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param QuestionMaterial $model
     */
    public function __construct(QuestionMaterial $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function deleteByQuestionId($id)
    {
        $model =  $this->model->where('question_id', $id)->get();
        foreach ($model as $material) {
            Storage::delete($material->link);
        }
        return $this->model->where('question_id', $id)->delete();
    }

}
