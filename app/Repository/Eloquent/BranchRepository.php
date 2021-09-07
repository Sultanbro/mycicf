<?php

namespace App\Repository\Eloquent;

use App\Branch;
use App\Repository\BranchRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BranchRepository extends BaseRepository implements BranchRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * QuizRepository constructor.
     *
     * @param Branch $model
     */
    public function __construct(Branch $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getBranch(int $id)
    {
        return $this->model::where('kias_id', $id)->first();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getChilds($id)
    {
        return $this->model::where('kias_parent_id', $id)->get();
    }

}
