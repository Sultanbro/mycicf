<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithNoAuthTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся создать пост без авторизации';

    public function getMeasureName() {
        return 'Add post with no auth';
    }

    public function testExecute() {
        $response = $this->post($this->route, []);
        $response->assertStatus(302);
    }
}
