<?php

namespace App\Repository\Eloquent;

use App\ConductTraining;
use App\Repository\ConductTrainingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ConductTrainingRepository extends BaseRepository implements ConductTrainingRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param ConductTraining $model
     */
    public function __construct(ConductTraining $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
