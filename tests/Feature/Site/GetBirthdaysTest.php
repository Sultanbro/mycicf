<?php

namespace Tests\Feature\Site;

use App\Like;
use App\Post;
use App\Question;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetBirthdaysTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Получаем список дней рождения';

    public const ISN = '5565';
    /**
     * @var Post
     */
    private $post;

    public function getRouteName() {
        return 'getBirthdays';
    }

    public function getMeasureName() {
        return 'Get Birthdays Test';
    }

    protected function prepare() {
    }

    public function handle() {
        $response = $this->post($this->route);

        // TODO Обработать данные

        $response->assertStatus(200);
    }

    public function cleanup() {

    }
}
