<?php

namespace App\Repository\Eloquent;

use App\QuizAnswers;
use App\Repository\QuizAnswerRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuizAnswerRepository extends BaseRepository implements QuizAnswerRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param QuizAnswers $model
     */
    public function __construct(QuizAnswers $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function deleteAnswersByQuizId(int $id)
    {
//        $this->model->
    }

}
