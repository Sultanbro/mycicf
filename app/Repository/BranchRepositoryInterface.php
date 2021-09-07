<?php

namespace App\Repository;

interface BranchRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getBranch(int $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getChilds($id);
}
