<?php


namespace App\Library\Services\KiasBranch;


use App\Branch;
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

    public function getFullBranch($request){
        ini_set('xdebug.max_nesting_level', 500);
        $headData = Branch::where('kias_id', 50)->first();
        $result = [];
        if(count($headData->childs)){
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getChild($headData->kias_id),
            ];
        }else{
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ];
        }
        $responseData = [
            'result' => $result,
        ];
        return response()->json($responseData);
    }

    public function getChild($parent_id)
    {
        $result = [];
        $data = Branch::where('kias_parent_id', $parent_id)->orderBy('has_child')->get();
        foreach($data as $branchData){
            if(count($branchData->childs)){
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                    'children' => $this->getChild($branchData->kias_id),
                ];
            }else{
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                ];
            }
        }
        return $result;
    }
}
