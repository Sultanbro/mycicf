<?php

namespace Tests\Feature\Education;

use App\Http\Controllers\Api\QuizController;
use App\Library\Services\Quiz\QuizSaveService;
use App\QuizQuestion;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class QuizControllerTest extends TestCase
{

    public function testQuiz()
    {
        $request = [
            "quiz" => [
                "name" => "Алгебр",
                "passing_score" => 80,
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

        $request['quiz']['id'] = $result;

        $index = $this->get('/api/quiz');
        $index
            ->assertOk()
            ->assertExactJson([
                'data' => [
                    $request['quiz'],
                ],
            ]);

        $show = $this->json('GET', '/api/quiz/' . $result);

        $show
            ->assertOk()
            ->assertJson([
                'data' => ["quiz_id" => $result, "name" => "Алгебр",
                    "passing_score" => 80,],
            ]);

        $oneQuestionAnswers = $this->json('GET', '/api/question/2');

        $oneQuestionAnswers
            ->assertOk()
            ->assertJson([
                'data' => ["question_id" => 2, "question" => "2) Где?",],
            ])
            ->assertJsonMissing([
                'right' => 1,
            ]);

        $oneQuestionRightAnswers = $this->json('GET', '/api/question/right/2');

        $oneQuestionRightAnswers
            ->assertOk()
            ->assertJsonFragment([
                'right' => 1,
            ]);

        $quizParametrsUpdate = $this->json('POST', '/api/one/quiz/1', ['_method' => 'PUT', 'name' => 'Алге', 'passing_score' => '60', 'time' => '02:00:15', 'description' => 'Очень ']);

        $quizParametrsUpdate
            ->assertOk()
            ->assertJson(['update' => true]);

        $saveMaterialByQuestion = $this->json('POST', '/api/question/material/1', ['_method' => 'PUT',
            'file' => UploadedFile::fake()->image('edinorog.jpg')
        ]);

        Storage::disk('local')->assertExists($saveMaterialByQuestion['link']);

        $saveMaterialByQuestion
            ->assertStatus(201);

        $deleteMaterial = $this->json('DELETE', '/api/question/material/1');

        $deleteMaterial
            ->assertStatus(200);

        Storage::disk('local')->assertMissing($saveMaterialByQuestion['link']);

        $deleteQuestionAnswers = $this->json('DELETE', '/api/question/2');

        $deleteQuestionAnswers->assertOk();

        $checkOneQuestionAnswers = $this->json('GET', '/api/question/2');

        $checkOneQuestionAnswers->assertOk()
            ->assertJson(['data' => array('Нет такого вопроса')]);

        $result2 = app(QuizSaveService::class)->quizParametersSave($request, $quizzes);

        $destroy = $this->json('DELETE', '/api/quiz/'.$result2);

        $destroy->assertOk();

        $show2 = $this->json('GET', '/api/quiz/' . $result2);

        $show2->assertOk()
            ->assertJson(['data' => array('Нет такого теста')]);


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
