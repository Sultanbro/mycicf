<?php

namespace App\Repository\Eloquent;

use App\Repository\TrainingProgramRepositoryInterface;
use App\TrainingProgram;
use Illuminate\Database\Eloquent\Model;

class TrainingProgramRepository extends BaseRepository implements TrainingProgramRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param TrainingProgram $model
     */
    public function __construct(TrainingProgram $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function deleteMaterial($id)
    {
        $model = $this->find($id);
        if (isset($model->material)) {
            $model->material()->detach();
        }
    }

}
