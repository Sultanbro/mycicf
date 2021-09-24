<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    /**
     * @var KiasBranchServiceInterface
     */
    private $branchService;

    public function __construct(KiasBranchServiceInterface $branchService)
    {
        $this->branchService = $branchService;
    }

    public function getFullBranch()
    {
        return $this->branchService->getFullBranch();
    }
}
