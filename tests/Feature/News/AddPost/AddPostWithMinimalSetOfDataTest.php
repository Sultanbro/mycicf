<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithMinimalSetOfDataTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с минимальным набором данных';

    public function handle() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, []);
        $response->assertStatus(200);
    }

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
