<?php


namespace App\Library\Services\KiasBranch;


use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use App\Repository\BranchRepositoryInterface;
use App\Repository\Eloquent\BranchRepository;

class KiasBranchService implements KiasBranchServiceInterface
{
    /**
     * @var BranchRepository
     */
    private $branchReposytory;

    public function __construct(BranchRepository $branchReposytory)
    {
        $this->branchReposytory = $branchReposytory;
    }


    public function getUserChilds($id)
    {
        $result = [];
        $model = $this->branchReposytory->getBranch($id);
        if (count($model->childs)) {
            $result = array_merge($result, $this->getChilds($id));
        } else {
            array_push($result, $id);
        }
        return $result;
    }

    public function getChilds($id)
    {

        $result = [];
        $model = $this->branchReposytory->getChilds($id);
        foreach ($model as $branchData) {
            if (count($branchData->childs)) {
                $result = array_merge($result, $this->getChilds($branchData->kias_id));
            } else {
                array_push($result, $branchData->kias_id);
            }
        }
        return $result;
    }
}
