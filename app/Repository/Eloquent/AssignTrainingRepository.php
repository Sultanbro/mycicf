<?php

namespace App\Repository\Eloquent;

use App\AssignTraining;
use App\Repository\AssignTrainingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AssignTrainingRepository extends BaseRepository implements AssignTrainingRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param AssignTraining $model
     */
    public function __construct(AssignTraining $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function updateSubdivisions(array $info)
    {
        $this->model->update($info);
    }

}
