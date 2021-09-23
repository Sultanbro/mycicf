<?php

namespace App\Library\Services\KiasBranch;

interface KiasBranchServiceInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUserChilds($id);

    /**
     * @param $request
     * @return mixed
     */
    public function getFullBranch($request);
}
