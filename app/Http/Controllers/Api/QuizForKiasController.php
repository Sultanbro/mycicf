<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveQuizForKiasRequst;
use App\Http\Resources\QuizForKiasResource;
use App\Library\Services\KiasBranch\KiasBranchService;
use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use App\Library\Services\Quiz\QuizSaveServiceInterface;
use App\Repository\Eloquent\QuizForKiasRepository;
use App\Repository\QuizForKiasRepositoryInterface;
use Illuminate\Http\Request;

class QuizForKiasController extends Controller
{
    /**
     * @var QuizForKiasRepositoryInterface
     */
    private $quizForKiasRepository;
    private $kiasBranchService;
    private $quizSaveService;

    public function __construct(QuizForKiasRepositoryInterface $quizForKiasRepository, KiasBranchServiceInterface $kiasBranchService, QuizSaveServiceInterface $quizSaveService)
    {
        $this->quizForKiasRepository = $quizForKiasRepository;
        $this->kiasBranchService = $kiasBranchService;
        $this->quizSaveService = $quizSaveService;
    }

    /**
     * Показывает все записи на тест
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuizForKiasResource::collection($this->quizForKiasRepository->all());
    }

    /**
     * Создает запись на тест
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(SaveQuizForKiasRequst $request)
    {
        return $this->quizSaveService->saveQuizForKias($request->validated());
    }

    /**
     * Показывает запись на тест принимает его id
     * Display the specified resource.
     *
     * @param  int  $id
     * @return QuizForKiasResource
     */
    public function show($id)
    {
        return new QuizForKiasResource($this->quizForKiasRepository->find($id));
    }

    /**
     * Изменяет запись на тест принимает id и изменение
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(SaveQuizForKiasRequst $request, $id)
    {
        return $this->quizForKiasRepository->update($id, $request->validated());
    }

    /**
     * Удаляет запись на тест
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->quizForKiasRepository->delete($id)) {
            return response()->json(true);
        }
        return response()->json(false);
    }
}
