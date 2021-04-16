<?php

namespace Tests\Feature\News\GetPosts;

class GetPostsWithNoAuthTest extends GetPostsTestBase {
    protected $description = 'Пытаемся получить список постов без авторизации';

    public const ISN = '1144';

    public function getMeasureName() {
        return 'Get Posts Test (no auth)';
    }

    public function testExecute() {
        $response = $this->post($this->route);
        $response->assertStatus(302);
    }
}
