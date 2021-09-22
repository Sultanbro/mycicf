<?php

namespace App\Repository\Eloquent;

use App\Repository\TrainingQuizRepositoryInterface;
use App\TrainingQuiz;
use Illuminate\Database\Eloquent\Model;

class TrainingQuizRepository extends BaseRepository implements TrainingQuizRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param TrainingQuiz $model
     */
    public function __construct(TrainingQuiz $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getQuizId($id)
    {
        return $this->model->where('training_program_id', $id)->get();
    }

}
