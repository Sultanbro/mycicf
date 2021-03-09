<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

/**
 * Class AddPostWithMinimalSetOfDataTest
 * @package Tests\Feature\News\AddPost
 * @covers \App\Http\Controllers\News\PostsController::addPost
 */
class AddPostWithMinimalSetOfDataTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с минимальным набором данных';

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);
        $response = $this->post($this->route, [
            'postText' => 'post #1',
            'isn' => $user->ISN,
        ]);
        $response->assertStatus(200);
        self::assertArrayHasKey('postId', $response->json());
        self::assertEquals('integer', gettype($response->json('postId')));
        self::assertEquals('boolean', gettype($response->json('pinned')));
        self::assertEquals('boolean', gettype($response->json('isLiked')));
        self::assertEquals('boolean', gettype($response->json('isVoted')));
        self::assertEquals('boolean', gettype($response->json('edited')));

        $postId = $response->json('postId');

        $getPosts = $this->post(route('news.getPosts'));

        $post = collect($getPosts->json())->first(function ($entry) use ($postId) {
            return $entry['postId'] == $postId;
        });

        self::assertNotNull($post);
    }

    public function getMeasureName() {
        return 'Add post with minimal set of data';
    }
}
