<?php

namespace Tests\Feature\News\AddPost;

use App\Post;
use Tests\WithUser;

/**
 * Class AddPostWithNoDataTest
 * @package Tests\Feature\News\AddPost
 * @covers \App\Http\Controllers\News\PostsController::addPost
 */
class AddPostWithNoDataTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Пытаемся создать пост без данных';

    public const ISN = '1144';

    public function testExecute() {
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
