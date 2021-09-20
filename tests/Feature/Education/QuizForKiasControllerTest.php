<?php

namespace Tests\Feature\Education;

use App\Branch;
use App\Http\Controllers\Api\QuizForKiasController;
use Tests\TestCase;

class QuizForKiasControllerTest extends TestCase
{

    public function testQuizForKias()
    {
        \Illuminate\Support\Facades\Artisan::call('db:seed --class=DatabaseSeeder --env=testing');
        $user_id = Branch::find(8)->kias_id;

        $store = $this->json('POST', '/api/for_kias', ['quiz_id' => 1, 'user_id' => $user_id, 'count_question' => 2, 'day' => '2023.10.20', 'try' => 3,]);

        $store->assertOk();

        $index = $this->json('GET', '/api/for_kias');

        $index->assertOk()
            ->assertJsonFragment([
                'quiz_id' => 1, 'user_id' => $user_id, 'count_question' => 2, 'try' => 3,
            ]);

        $show = $this->json('GET', '/api/for_kias/'.$index['data'][0]['id']);

        $show->assertOk()
            ->assertJsonFragment([
                'quiz_id' => 1, 'user_id' => $user_id, 'count_question' => 2, 'try' => 3,
            ]);

        $update = $this->json('POST', 'api/for_kias/'.$index['data'][0]['id'],  ['_method' => 'PUT', 'quiz_id' => 1, 'user_id' => $user_id, 'count_question' => 1, 'day' => '2023.10.20', 'try' => 4,]);

        $update->assertOk()
            ->assertJsonFragment(['count_question' => 1, 'try' => 4,]);

        $destroy = $this->json('DELETE', 'api/for_kias/'.$index['data'][0]['id']);

        $destroy->assertOk();

        $show2 = $this->json('GET', '/api/for_kias/'.$index['data'][0]['id']);

        $show2->assertOk()
            ->assertJson(['data' => array('Нет записи')]);

    }

}
