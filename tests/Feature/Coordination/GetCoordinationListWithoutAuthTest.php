<?php

namespace Tests\Feature\Coordination;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetCoordinationListWithoutAuthTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Согласование (попытка получить данные без авторизации)';

    public const ISN = '1144';

    public function getRouteName() {
        return 'coordination.getList';
    }

    public function getMeasureName() {
        return 'Get Birthdays Test';
    }

    protected function prepare() {

    }

    public function testExecute() {
        $response = $this->post($this->route, [
            'isn' => self::ISN
        ]);
        $response->assertStatus(302);
    }

    public function cleanup() {
    }
}
