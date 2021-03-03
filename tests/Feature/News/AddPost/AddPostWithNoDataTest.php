<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithNoDataTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся создать пост без данных';

    public const ISN = '5565';

    public function handle() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, [

        ]);
        $response->assertJson([
            'success' => false,
        ]);
    }

    public function getMeasureName() {
        return 'Add post with no data';
    }
}
