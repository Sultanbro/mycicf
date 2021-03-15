<?php

namespace Tests\Feature\Coordination;

use App\Branch;
use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;
use function Deployer\isVeryVerbose;

class GetCoordinationListTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Согласование';

    public const ISN = '1144';

    public function getRouteName() {
        return 'coordination.getList';
    }

    public function getMeasureName() {
        return 'Get Coordination List';
    }

    protected function prepare() {

    }

    public function testExecute() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, [
            'isn' => self::ISN
        ]);
        $response->assertStatus(200);
    }

    public function cleanup() {
    }
}
