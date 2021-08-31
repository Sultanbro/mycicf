<?php

namespace App\Library\Services\Quiz;

use App\Quiz;
use App\QuizAnswers;
use App\QuizQuestion;
use App\Repository\QuizRepositoryInterface;

// Сервис для сохранение теста с параметрами

class QuizSaveService implements QuizSaveServiceInterface
{

    /**
     * @var QuizRepositoryInterface
     */
    private $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
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

        return Quiz::firstOrCreate($quiz_params);

    }

    //Принимает
    // $quiz_id = айди теста
    // $question = вопрос сохроняет и возвращает id вопроса
    public function quizSaveQuestionSave($quiz_id, $question)
    {

            $quizModel = QuizQuestion::firstOrCreate(['quiz_id' => $quiz_id,
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
                QuizAnswers::firstOrCreate([
                    'question_id' => $question_id,
                    'answer' => $answer,
                    'right' => ($quiz[5] == $k) ? 1 : 0,
                ]);
            }

        }
    }
}
