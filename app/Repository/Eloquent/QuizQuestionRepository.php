<?php

namespace App\Repository\Eloquent;

use App\Quiz;
use App\QuizQuestion;
use App\Repository\QuizQuestionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class QuizQuestionRepository extends BaseRepository implements QuizQuestionRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param QuizQuestion $model
     */
    public function __construct(QuizQuestion $model)
    {
        parent::__construct($model);
    }

    public function deleteQuestionByQuizId(int $id){
        return $this->model->where('quiz_id', $id)->delete();
    }

    public function countQuestionBiQuiz($id)
    {
        return $this->model->where('quiz_id', $id)->count();
    }
}
