<?php

namespace App\Repository\Eloquent;

use App\Repository\UndergoTrainingRepositoryInterface;
use App\UndergoTraining;
use Illuminate\Database\Eloquent\Model;

class UndergoTrainingRepository extends BaseRepository implements UndergoTrainingRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param UndergoTraining $model
     */
    public function __construct(UndergoTraining $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
