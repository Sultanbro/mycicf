<?php

namespace Tests\Feature\Site\GetUserData;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

class GetUserDataTest extends FeatureTestBase {
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
        return 'Get Users Data Test';
    }

    protected function prepare() {
        $isn = '1115';
        User::where('isn', '=', $isn)->forceDelete();

        $this->user = new User();
        $this->user->ISN = $isn;
        $this->user->username = 'User';
        $this->user->password_hash = \Hash::make('password');
        $this->user->level = '1111';
        $this->user->short_name = 'User';
        $this->user->full_name = 'User';
        $this->user->session_id = 1;
        $this->user->dept_isn = '557';
        $this->user->save();
    }

    public function handle() {
        $this->actingAs($this->user);
        $response = $this->post($this->route);

        // TODO Обработать данные

        $response->assertStatus(200);
        $json = $response->json();
        self::assertTrue($json['success']);
        self::assertTrue(array_key_exists('Duty', $json['response']));
        self::assertTrue(array_key_exists('Name', $json['response']));
        self::assertTrue(array_key_exists('Birthday', $json['response']));
        self::assertTrue(array_key_exists('Married', $json['response']));
        self::assertTrue(array_key_exists('Education', $json['response']));
        self::assertTrue(array_key_exists('Rating', $json['response']));
        self::assertTrue(array_key_exists('City', $json['response']));
        self::assertTrue(array_key_exists('Avarcom', $json['response']));
        self::assertTrue(array_key_exists('MyDZ', $json['response']));
    }

    public function cleanup() {
        $this->user->delete();
    }
}
