<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizDownloadRequest;
use App\Http\Requests\QuizParametrsRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Http\Requests\SaveQuizForKiasRequst;
use App\Http\Resources\QuestionAnswerResource;
use App\Http\Resources\QuestionAnswersResource;
use App\Http\Resources\QuizСontentResource;
use App\Http\Resources\QuizResource;
use App\Imports\UsersImport;
use App\Library\Services\Quiz\QuizSaveServiceInterface;
use App\Repository\Eloquent\QuizAnswerRepository;
use App\Repository\Eloquent\QuizForKiasRepository;
use App\Repository\Eloquent\QuizQuestionRepository;
use App\Repository\Eloquent\QuizRepository;
use App\Repository\QuestionMaterialRepositoryInterface;
use App\Repository\QuizAnswerRepositoryInterface;
use App\Repository\QuizForKiasRepositoryInterface;
use App\Repository\QuizQuestionRepositoryInterface;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class QuizController extends Controller
{

    /**
     * @var QuizRepository
     * @var QuizAnswerRepository
     * @var QuizQuestionRepository
     */
    private $quizRepository;
    private $quizAnswersRepository;
    private $quizQuestionsRepository;
    private $quizForKiasRepository;
    /**
     * @var QuestionMaterialRepositoryInterface
     */
    private $questionMaterialRepository;

    /**
     * QuizController constructor.
     * @param QuizRepositoryInterface $quizRepository
     * @param QuizQuestionRepositoryInterface $quizQuestionsRepository
     * @param QuizAnswerRepositoryInterface $quizAnswersRepository
     * @param QuizForKiasRepositoryInterface $quizForKiasRepository
     * @param QuestionMaterialRepositoryInterface $questionMaterialRepository
     */
    public function __construct(QuizRepositoryInterface $quizRepository, QuizQuestionRepositoryInterface $quizQuestionsRepository, QuizAnswerRepositoryInterface $quizAnswersRepository, QuizForKiasRepositoryInterface $quizForKiasRepository, QuestionMaterialRepositoryInterface $questionMaterialRepository)
    {
        $this->quizQuestionsRepository = $quizQuestionsRepository;
        $this->quizAnswersRepository = $quizAnswersRepository;
        $this->quizRepository = $quizRepository;
        $this->quizForKiasRepository = $quizForKiasRepository;
        $this->questionMaterialRepository = $questionMaterialRepository;
    }

    /**
     * Возвращает список всех тестов с данными
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {

        return QuizResource::collection($this->quizRepository->all());

    }

    /**
     * Создает тест принимает параметры теста, вопросы, ответы и правильные ответы
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(QuizSaveServiceInterface $quizSaveService, QuizDownloadRequest $request)
    {

        $result = $quizSaveService->quizParametersSave($request->all(), Excel::toCollection(new UsersImport(), $request->file('file')));

        if (!$result) {
            return response()->json(false);
        }
        return response()->json(true);
    }

    /**
     * Принимает id теста и возвращает тест с параметрами, вопросы, ответы и правильные ответы
     * Display the specified resource.
     *
     * @param int $id
     * @return QuizСontentResource
     */
    public function show($id)
    {

        return new QuizСontentResource($this->quizRepository->getQuizWithQuestionsById($id));

    }

    /**
     * Обновляет данные в вопросе, ответе и правильным ответе
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(QuizUpdateRequest $request, $id)
    {

        if (!empty($this->quizQuestionsRepository->update($id, $request->question))) {

            foreach ($request->answers as $answer) {
                $modal = $this->quizAnswersRepository->find($answer['answer_id']);
                unset($answer['answer_id']);
                $modal->update($answer);
            }
            return response()->json(true);
        }

        return response()->json(false);

    }

    /**
     * Обновляет параметры теста
     * @param QuizParametrsRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function quizParametrsUpdate(QuizParametrsRequest $request, $id)
    {

        if (!empty($model = $this->quizRepository->update($id, $request->validated()))) {

            return response()->json(true);

        }
        return response()->json(false);

    }

    /**
     * Удаляет тест принимает id теста
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        return response()->json($this->quizRepository->delete($id));
    }

    /**
     * Принимает $id = id вопроса и возвращает вопросы, ответы и правильный ответ
     * @param $id
     * @return QuestionAnswerResource
     */
    public function oneQuestionRightAnswers(int $id)
    {

        return new QuestionAnswerResource($this->quizQuestionsRepository->find($id));

    }

    /**
     * Принимает $id = id вопроса и возвращает вопросы и ответы
     * @param int $id
     * @return QuestionAnswersResource
     */
    public function oneQuestionAnswers(int $id)
    {
        return new QuestionAnswersResource($this->quizQuestionsRepository->find($id));
    }

    /**
     * Удаляет вопрос принимает id вопроса
     * @param int $id
     * @return JsonResponse
     */
    public function deleteQuestionAnswers(int $id)
    {
        $this->questionMaterialRepository->deleteByQuestionId($id);
        return response()->json($this->quizQuestionsRepository->delete($id));
    }

    /**
     * Сохраняет материял для вопроса принимает file и id вопроса
     * @param Request $request
     * @param $questionId
     * @return \Illuminate\Database\Eloquent\Model|JsonResponse
     */
    public function saveMaterialByQuestion(Request $request, $questionId)
    {
        if (!empty($this->quizQuestionsRepository->find($questionId))) {

            $result = Storage::disk('local')->put("/public/question", $request->file);
            return $this->questionMaterialRepository->create(['question_id' => $questionId, 'link' => $result]);

        }
        return response()->json(false);
    }

    /**
     * Удаляет материал вопроса принимает id материала
     * @param $id
     * @return JsonResponse
     */
    public function deleteMaterial($id)
    {
        if (!empty($material = $this->questionMaterialRepository->find($id))) {

            Storage::delete($material->link);
            return response()->json($this->questionMaterialRepository->delete($id));

        }
        return response()->json(false);
    }

}
