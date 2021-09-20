<?php

namespace Tests\Unit\Education;

use App\Library\Services\Quiz\QuizSaveService;
use App\QuizQuestion;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizSaveServiceTest extends TestCase
{

    //Service
    public function testQuizParametersSave()
    {
        $request = [
            "quiz" => [
                "name" => "Алгебр",
                "passing_score" => "80",
                "time" => "02:00:01",
                "description" => "Очень сложный",
            ]
        ];
        $quizzes = [
            [
                [
                    "1)  2+2 = ?",
                    "A)5",
                    "B)12",
                    "C)85",
                    "D)4",
                    3
                ],
                [
                    "2) Где?",
                    "A)Алматы",
                    "B)Караганде",
                    "C)Нурсултане",
                    "D)Шым",
                    4
                ]
            ]
        ];

        $result = app(QuizSaveService::class)->quizParametersSave($request, $quizzes);
        $bool = $result > 0;
        $this->assertTrue($bool);
        $this->checkQuizParams($result, $request);
        $this->checkQuestions($result, $quizzes);

    }

    private function checkQuizParams($id, $request)
    {
        $model = app(QuizRepositoryInterface::class)->find($id);
        $this->assertEquals($model->name, $request['quiz']['name']);
        $this->assertEquals($model->passing_score, $request['quiz']['passing_score']);
        $this->assertEquals($model->time, $request['quiz']['time']);
        $this->assertEquals($model->description, $request['quiz']['description']);
    }

    private function checkQuestions($id, $quizzes)
    {

        $modalQuestion = QuizQuestion::where('quiz_id', $id)->get();

        foreach ($modalQuestion as $k => $question) {
            $this->assertEquals($quizzes[0][$k][0], $question['question']);
        }

    }

}
