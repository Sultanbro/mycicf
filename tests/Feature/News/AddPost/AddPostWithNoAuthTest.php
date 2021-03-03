<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithNoAuthTest extends AddPostTestBase {
    use WithUser;

    public function getMeasureName() {
        return 'Add post with no auth';
    }

    public function handle() {
        $response = $this->post($this->route, []);
        $response->assertStatus(302);
    }
}
