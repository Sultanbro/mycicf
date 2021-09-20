<?php

namespace App\Library\Services\Quiz;

use App\Library\Services\KiasBranch\KiasBranchServiceInterface;
use App\Quiz;
use App\QuizAnswers;
use App\QuizQuestion;
use App\Repository\QuizAnswerRepositoryInterface;
use App\Repository\QuizForKiasRepositoryInterface;
use App\Repository\QuizQuestionRepositoryInterface;
use App\Repository\QuizRepositoryInterface;

// Сервис для сохранение теста с параметрами

class QuizSaveService implements QuizSaveServiceInterface
{

    /**
     * @var QuizRepositoryInterface
     */
    private $quizRepository;
    private $kiasBranchService;
    /**
     * @var QuizForKiasRepositoryInterface
     */
    private $quizForKiasRepository;
    /**
     * @var QuizQuestionRepositoryInterface
     */
    private $quizQuestionRepository;
    /**
     * @var QuizAnswerRepositoryInterface
     */
    private $quizAnswerRepository;

    public function __construct(QuizRepositoryInterface $quizRepository, KiasBranchServiceInterface $kiasBranchService, QuizForKiasRepositoryInterface $quizForKiasRepository, QuizQuestionRepositoryInterface $quizQuestionRepository,  QuizAnswerRepositoryInterface $quizAnswerRepository)
    {
        $this->quizRepository = $quizRepository;
        $this->kiasBranchService = $kiasBranchService;
        $this->quizForKiasRepository = $quizForKiasRepository;
        $this->quizQuestionRepository = $quizQuestionRepository;
        $this->quizAnswerRepository = $quizAnswerRepository;
    }

    // $req = параметры теста
    //$quizzes = массив с вопросами, ответами и правильный ответ
    public function quizParametersSave($reg, $quizzes)
    {
        //Сохроняет параметры теста и возвращает id
        $quiz_id = $this->quizSave($reg['quiz'])->id;

        //Отправляет каждый вопрос отдельно на методы для сохранения с привязкой
        foreach ($quizzes[0] as $quiz) {
            $question_id = $this->quizSaveQuestionSave($quiz_id, $quiz[0]);
            unset($quiz[0]);
            $this->quizAnswerSave($question_id, $quiz);

        }

        return $quiz_id;
    }

    //Принимает параметры теста имя, проходной балл и время и сохраняет
    public function quizSave($quiz_params)
    {

        return $this->quizRepository->create($quiz_params);

    }

    //Принимает
    // $quiz_id = айди теста
    // $question = вопрос сохроняет и возвращает id вопроса
    public function quizSaveQuestionSave($quiz_id, $question)
    {

        $quizModel = $this->quizQuestionRepository->create(['quiz_id' => $quiz_id,
            'question' => $question,]);
        return $quizModel->id;

    }

    //Принимает и сохроняет
    // $question_id = id вопроса
    // $quiz = массив ответы вопроса и правильный ответ
    public function quizAnswerSave($question_id, $quiz)
    {
        foreach ($quiz as $k => $answer) {

            if ($k != 5) {
                $this->quizAnswerRepository->create([
                    'question_id' => $question_id,
                    'answer' => $answer,
                    'right' => ($quiz[5] == $k) ? 1 : 0,
                ]);
            }

        }
    }

    /**
     * Сохраняет запись на тестирование принимает user_id и id программы обучения
     * @param array $array
     * @return mixed|void
     */
    public function saveQuizForKias(array $array)
    {
        $users_id = $this->kiasBranchService->getUserChilds($array['user_id']);

        foreach ($users_id as $user_id) {
            $array['user_id'] = $user_id;
            $array['training_program_id'] = isset($array['training_program_id']) ? $array['training_program_id'] : null;
            $this->quizForKiasRepository->create($array);
        }
    }
}
