<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingProgramSaveRequest;
use App\Http\Resources\TrainingProgramOneResource;
use App\Library\Services\Quiz\QuizSaveServiceInterface;
use App\Repository\QuizForKiasRepositoryInterface;
use App\Repository\TrainingMaterialRepositoryInterface;
use App\Repository\TrainingProgramRepositoryInterface;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{

    private $trainingProgramRepository;
    private $trainingMaterialRepository;
    private $quizSaveService;
    private $quizForKias;

    public function __construct(TrainingProgramRepositoryInterface $trainingProgramRepository, TrainingMaterialRepositoryInterface $trainingMaterialRepository, QuizSaveServiceInterface $quizSaveService, QuizForKiasRepositoryInterface $quizForKias)
    {
        $this->trainingProgramRepository = $trainingProgramRepository;
        $this->trainingMaterialRepository = $trainingMaterialRepository;
        $this->quizSaveService = $quizSaveService;
        $this->quizForKias = $quizForKias;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrainingProgramOneResource::collection($this->trainingProgramRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingProgramSaveRequest $request)
    {
        if ($training_id = $this->trainingProgramRepository->create($request->program)->id) {
            if ($request->has('material_id')) {
                $this->saveMaterial($training_id, $request->material_id);
            }
            if ($request->has('quiz')) {
                $this->saveQuiz($training_id, $request->quiz);
            }

            return response()->json(true);
        }
        return response()->json(false);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TrainingProgramOneResource($this->trainingProgramRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($this->trainingProgramRepository->update($id, $request->parametr))) {

            if ($request->has('material_id')) {
                $this->saveMaterial($id, $request->material_id);
            }
            if ($request->has('quiz')) {
                $this->saveQuiz($id, $request->quiz);
            }

            return response()->json(true);
        }

        return response()->json(false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->quizForKias->deleteByTrainingId($id);
        $this->trainingProgramRepository->deleteMaterial($id);
        if ($this->trainingProgramRepository->delete($id)) {

            return response()->json(true);
        }
        return response()->json(false);
    }

    /**
     * @param $training_id
     * @param $materials_id
     * @return bool
     */
    public function saveMaterial($training_id, $materials_id)
    {
        foreach ($materials_id as $material_id) {
            $this->trainingMaterialRepository->create(['training_program_id' => $training_id, 'educational_material_id' => $material_id]);
        }
    }

    /**
     * @param $training_id
     * @param $quizzes
     * @return mixed
     */
    public function saveQuiz($training_id, $quizzes)
    {
        foreach ($quizzes as $quiz) {
            $quizForKias = $quiz;
            $quizForKias['training_program_id'] = $training_id;
            $this->quizSaveService->saveQuizForKias($quizForKias);
        }
    }
}
