<?php

namespace App\Repository\Eloquent;

use App\EducationalMaterial;
use App\Repository\EducationalMaterialRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EducationalMaterialRepository extends BaseRepository implements EducationalMaterialRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param EducationalMaterial $model
     */
    public function __construct(EducationalMaterial $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
