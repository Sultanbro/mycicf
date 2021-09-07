<?php

namespace App\Repository;

interface QuizForKiasRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function deleteByTrainingId($id);
}
