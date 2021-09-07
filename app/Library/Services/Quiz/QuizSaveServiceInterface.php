<?php

namespace App\Library\Services\Quiz;

interface QuizSaveServiceInterface
{
    /**
     * Сохранение теста с параметрами
     *
     * @param $reg
     * @param $tests
     */
    public function quizParametersSave($reg, $tests);

    /**
     * @param array $tests
     * @return mixed
     */
    public function saveQuizForKias(array $tests);
}
