<?php

namespace App\Repository\Eloquent;

use App\Repository\TrainingMaterialRepositoryInterface;
use App\TrainingMaterial;
use Illuminate\Database\Eloquent\Model;

class TrainingMaterialRepository extends BaseRepository implements TrainingMaterialRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param TrainingMaterial $model
     */
    public function __construct(TrainingMaterial $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
