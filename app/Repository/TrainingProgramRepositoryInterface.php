<?php

namespace App\Repository;

interface TrainingProgramRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function deleteMaterial($id);
}
