<?php

namespace App\Repository\Eloquent;

use App\AssignTrainingsProgram;
use App\Repository\AssignTrainingProgramsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AssignTrainingProgramsRepository extends BaseRepository implements AssignTrainingProgramsRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param AssignTrainingsProgram $model
     */
    public function __construct(AssignTrainingsProgram $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function updateSubdivisions(array $info)
    {
        $this->model->update($info);
    }

}
