<?php

namespace App\Repository\Eloquent;

use App\QuizForKias;
use App\Repository\QuizForKiasRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuizForKiasRepository extends BaseRepository implements QuizForKiasRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param QuizForKias $model
     */
    public function __construct(QuizForKias $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param $id
     */
    public function deleteByTrainingId($id)
    {
        $this->model->where('training_program_id', $id)->delete();
    }

}
