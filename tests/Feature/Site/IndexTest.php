<?php

namespace Tests\Feature\Site;

use App\Branch;
use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

/**
 * Class IndexTest
 * @package Tests\Feature\Site
 *
 * @covers \App\Http\Controllers\SiteController::getIndex
 */
class IndexTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Главная страница';

    public const ISN = '1144';
    /**
     * @var Post
     */
    private $post;

    /**
     * @var Branch
     */
    private $branch;

    /**
     * @var Carbon
     */
    private $date;

    public function getRouteName() {
        return 'index';
    }

    public function getMeasureName() {
        return 'Index page';
    }

    protected function prepare() {
    }

    public function testExecute() {
        $response = $this->get($this->route);
        $response->assertStatus(200);

        $this->actingAs($this->getUser());
        $response = $this->get($this->route);
        $response->assertRedirect(route('news.index'));
    }

    public function cleanup() {
    }
}
