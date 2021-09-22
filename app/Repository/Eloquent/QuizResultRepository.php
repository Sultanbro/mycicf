<?php

namespace App\Repository\Eloquent;

use App\QuizResult;
use App\Repository\QuizResultRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuizResultRepository extends BaseRepository implements QuizResultRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param QuizResult $model
     */
    public function __construct(QuizResult $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
