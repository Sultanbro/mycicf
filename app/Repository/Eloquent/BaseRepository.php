<?php


namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model[]|Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param int $modelId
     * @param array $attributes
     * @return Model|null
     */
    public function update(int $modelId, array $attributes): ?Model
    {
        $model = $this->find($modelId);

        if (empty($model)) {
            return $model;
        }

        if($model->update($attributes)) {
            return $model;
    }

    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): bool
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            return false;
        }
        return $model->delete();
    }
}
