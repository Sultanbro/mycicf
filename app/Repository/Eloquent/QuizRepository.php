<?php

namespace App\Repository\Eloquent;

use App\Quiz;
use App\QuizQuestion;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuizRepository extends BaseRepository implements QuizRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param Quiz $model
     */
    public function __construct(Quiz $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getQuizWithQuestionsById(int $id)
    {
        return $this->model->with('quizQuestions')->find($id);
    }

}
