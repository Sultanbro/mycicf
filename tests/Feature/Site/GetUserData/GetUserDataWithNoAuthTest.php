<?php

namespace Tests\Feature\Site\GetUserData;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

class GetUserDataWithNoAuthTest extends FeatureTestBase {
    use WithFaker;

    protected $description = 'Получаем данные пользователя';

    /**
     * @var User
     */
    private $user;

    public function getRouteName() {
        return 'getUsersData';
    }

    public function getMeasureName() {
        return 'Get users data with no auth Test';
    }

    protected function prepare() {
    }

    public function handle() {
        $response = $this->post($this->route);

        // TODO Обработать данные

        $response->assertStatus(302);
    }

    public function cleanup() {
    }
}
