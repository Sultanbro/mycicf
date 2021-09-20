<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignTrainingRequest;
use App\Http\Resources\AssignTrainingResource;
use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use App\Repository\AssignTrainingProgramsRepositoryInterface;
use App\Repository\AssignTrainingRepositoryInterface;
use Illuminate\Http\Request;

class AssignTrainingController extends Controller
{

    /**
     * @var AssignTrainingRepositoryInterface
     */
    private $assignTrainingRepository;
    /**
     * @var KiasBranchServiceInterface
     */
    private $branchService;
    /**
     * @var AssignTrainingProgramsRepositoryInterface
     */
    private $assignTrainingProgramsRepository;

    public function __construct(AssignTrainingRepositoryInterface $assignTrainingRepository, KiasBranchServiceInterface $branchService, AssignTrainingProgramsRepositoryInterface $assignTrainingProgramsRepository)
    {
        $this->assignTrainingRepository = $assignTrainingRepository;
        $this->branchService = $branchService;
        $this->assignTrainingProgramsRepository = $assignTrainingProgramsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AssignTrainingResource::collection($this->assignTrainingRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignTrainingRequest $request)
    {
        $assignTraining = $request->validated();
        $users_id = $this->branchService->getUserChilds($request->user_id);
        foreach ($users_id as $user_id) {
            unset($assignTraining['training_programs_id']);
            $assignTraining['user_id'] = $user_id;
            $assignTraining_id = $this->assignTrainingRepository->create($assignTraining)->id;
            foreach ($request->training_programs_id as $training_program) {
                $this->assignTrainingProgramsRepository->create(['assign_training_id' => $assignTraining_id, 'training_programs_id' => $training_program]);
            }
        }
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AssignTrainingResource($this->assignTrainingRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssignTrainingRequest $request, $id)
    {
        return response()->json($this->assignTrainingRepository->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json($this->assignTrainingRepository->delete($id));
    }

    public function showSubdivisions(Request $request)
    {

        return new AssignTrainingResource($this->assignTrainingRepository->find($id));
    }

    /**
     * @param AssignTrainingRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSubdivisions(AssignTrainingRequest $request)
    {
        $assignTraining = $request->validated();
        $users_id = $this->branchService->getUserChilds($request->user_id);
        foreach ($users_id as $user_id) {
            $assignTraining['user_id'] = $user_id;
            $this->assignTrainingRepository->update($id, $assignTraining);
        }
        return response()->json(true);
    }
}
