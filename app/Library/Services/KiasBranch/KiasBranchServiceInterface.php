<?php

namespace App\Library\Services\KiasBranch;

interface KiasBranchServiceInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUserChilds($id);
}
