<?php

namespace App\Repository;

interface QuestionMaterialRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function deleteByQuestionId($id);
}
