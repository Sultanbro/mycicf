<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignTrainingRequest;
use App\Http\Requests\AssignTrainingUpdateRequest;
use App\Http\Resources\AssignTrainingResource;
use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use App\Repository\AssignTrainingProgramsRepositoryInterface;
use App\Repository\AssignTrainingRepositoryInterface;
use App\Repository\QuizResultRepositoryInterface;
use App\Repository\TrainingProgramRepositoryInterface;
use App\Repository\TrainingQuizRepositoryInterface;
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
    /**
     * @var QuizResultRepositoryInterface
     */
    private $quizResultRepository;
    /**
     * @var TrainingProgramRepositoryInterface
     */
    private $trainingProgramRepository;
    /**
     * @var TrainingQuizRepositoryInterface
     */
    private $trainingQuizRepository;

    public function __construct(AssignTrainingRepositoryInterface $assignTrainingRepository, KiasBranchServiceInterface $branchService, AssignTrainingProgramsRepositoryInterface $assignTrainingProgramsRepository, QuizResultRepositoryInterface $quizResultRepository, TrainingProgramRepositoryInterface $trainingProgramRepository, TrainingQuizRepositoryInterface $trainingQuizRepository)
    {
        $this->assignTrainingRepository = $assignTrainingRepository;
        $this->branchService = $branchService;
        $this->assignTrainingProgramsRepository = $assignTrainingProgramsRepository;
        $this->quizResultRepository = $quizResultRepository;
        $this->trainingProgramRepository = $trainingProgramRepository;
        $this->trainingQuizRepository = $trainingQuizRepository;
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
        $assignTraining = $this->assignTrainingRepository->create(['kias_id' => $request->kias_id, 'date_start' => $request->date_start, 'date_end' => $request->date_end]);
        $users_id = $this->branchService->getUserChilds($request->kias_id);

        foreach ($request->training_programs_id as $training_program_id) {

            $this->assignTrainingProgramsRepository->create(['assign_training_id' => $assignTraining->id, 'training_programs_id' => $training_program_id]);
            $trainingQuizzes = $this->trainingQuizRepository->getQuizId($training_program_id);

            foreach ($trainingQuizzes as $trainingQuiz) {

                foreach ($users_id as $user_id) {

                    $this->quizResultRepository->create(['user_id' => $user_id, 'all_try' => $trainingQuiz->try, 'training_programs_id' => $trainingQuiz->training_program_id, 'quiz_id' => $trainingQuiz->quiz_id, 'assign_training_id' => $assignTraining->id]);

                }
            }
        }
        return response()->json($assignTraining);
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
    public function update(AssignTrainingUpdateRequest $request, $id)
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

}
