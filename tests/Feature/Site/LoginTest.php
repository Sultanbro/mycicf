<?php

namespace Tests\Feature\Site;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

class LoginTest extends FeatureTestBase {
    use WithFaker;

    const ISN = '1115';
    protected $description = 'Авторизация';

    /**
     * @var User
     */
    private $user;

    public function getRouteName() {
        return 'login';
    }

    public function getMeasureName() {
        return 'Login Test';
    }

    protected function prepare() {
        User::whereIsn(self::ISN)->delete();

        $this->user = new User();
        $this->user->ISN = self::ISN;
        $this->user->username = 'User';
        $this->user->password_hash = \Hash::make('password');
        $this->user->level = '1111';
        $this->user->short_name = 'User';
        $this->user->full_name = 'User';
        $this->user->session_id = 1;
        $this->user->dept_isn = '557';
        $this->user->save();
    }

    public function testExecute() {
        $response = $this->post($this->route, [
            'username' => '',
            'password' => '',
        ]);

        // TODO Обработать данные

        $response->assertStatus(200);
    }

    public function cleanup() {
        $this->user->delete();
    }
}
