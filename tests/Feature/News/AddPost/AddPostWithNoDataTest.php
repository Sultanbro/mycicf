<?php

namespace Tests\Feature\News\AddPost;

use App\Post;
use Tests\WithUser;

class AddPostWithNoDataTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся создать пост без данных';

    public const ISN = '1144';

    public function handle() {
        $this->actingAs($this->getUser());
        $count = Post::count();
        $response = $this->post($this->route, [

        ]);
        $response->assertJson([
            'success' => false,
        ]);
        self::assertEquals($count, Post::count());
    }

    public function getMeasureName() {
        return 'Add post with no data';
    }
}
