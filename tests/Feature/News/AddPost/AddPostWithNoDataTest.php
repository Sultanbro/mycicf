<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithNoDataTest extends AddPostTestBase {
    use WithUser;

    public const ISN = '5565';

    public function handle() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, [

        ]);
        $response->assertJson([]);
    }

    public function getMeasureName() {
        return 'Add post with no data';
    }
}
