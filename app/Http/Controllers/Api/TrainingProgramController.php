<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingProgramSaveRequest;
use App\Http\Resources\TrainingProgramOneResource;
use App\Library\Services\Quiz\QuizSaveServiceInterface;
use App\Repository\QuizForKiasRepositoryInterface;
use App\Repository\TrainingMaterialRepositoryInterface;
use App\Repository\TrainingProgramRepositoryInterface;
use App\Repository\TrainingQuizRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{

    private $trainingProgramRepository;
    private $trainingMaterialRepository;
    private $quizSaveService;
    private $quizForKias;
    /**
     * @var TrainingQuizRepositoryInterface
     */
    private $trainingQuizRepository;

    public function __construct(TrainingProgramRepositoryInterface $trainingProgramRepository, TrainingMaterialRepositoryInterface $trainingMaterialRepository, QuizSaveServiceInterface $quizSaveService, QuizForKiasRepositoryInterface $quizForKias, TrainingQuizRepositoryInterface $trainingQuizRepository)
    {
        $this->trainingProgramRepository = $trainingProgramRepository;
        $this->trainingMaterialRepository = $trainingMaterialRepository;
        $this->trainingQuizRepository = $trainingQuizRepository;
        $this->quizSaveService = $quizSaveService;
        $this->quizForKias = $quizForKias;
    }

    /**
     * Показывает все программы обучения
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrainingProgramOneResource::collection($this->trainingProgramRepository->all());
    }

    /**
     * Создает программу обучения
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
     * Показывает программу обучения
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
     * Изменяет программу обучения если есть материал или тест добавляет
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
     * Удаляет программу обучения если есть материаллы и тест
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->trainingProgramRepository->delete($id)) {

            return response()->json(true);
        }
        return response()->json(false);
    }

    /**
     * Принимает id программы обучения и id материала и сохроняет с привязкой
     * @param $training_id
     * @param $materials_id
     * @return bool
     */
    public function saveMaterial($training_id, $materials_id)
    {
        foreach ($materials_id as $material_id) {
            try {
                $this->trainingMaterialRepository->create(['training_program_id' => $training_id, 'educational_material_id' => $material_id]);
            }
            catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                   continue;
                }
            }

        }
    }

    /**
     * Принимает данные теста, id программы обучения и сохроняет в таблицу quiz_for_kias
     * @param $training_id
     * @param $quizzes
     * @return mixed
     */
    public function saveQuiz($training_id, $quizzes)
    {
        foreach ($quizzes as $quiz) {
            try {
            $quiz['training_program_id'] = $training_id;
            $this->trainingQuizRepository->create($quiz);
            }
            catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    continue;
                }
            }
        }
    }

    public function deleteMaterial($id)
    {
        return response()->json($this->trainingMaterialRepository->delete($id));
    }

    public function deleteQuiz($id)
    {
        return response()->json($this->trainingQuizRepository->delete($id));
    }
}
