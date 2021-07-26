<?php

namespace Tests\Feature\News\GetPosts;

/**
 * Class GetPostsTest
 * @package Tests\Feature\News\GetPosts
 * @covers \App\Http\Controllers\NewsController::getPosts
 */
class GetPostsTest extends GetPostsTestBase {
    protected $description = 'Получаем список постов';

    public const ISN = '1144';

    public function testExecute() {
        $this->actingAs($this->getUser());

        $response = $this->post($this->route);

        $response->assertStatus(200);

        $postsResponse = collect(json_decode($response->content(), true));

        foreach ($postsResponse as $post) {
            self::assertEquals('integer', gettype($post['postId']));
            self::assertEquals('boolean', gettype($post['pinned']));
            self::assertEquals('boolean', gettype($post['isLiked']));
            self::assertEquals('boolean', gettype($post['isVoted']));
            self::assertEquals('boolean', gettype($post['edited']));
        }

        $newPost = $postsResponse->first(function ($foundPost) {
            return $foundPost['postId'] === $this->post->id;
        });

        self::assertEquals($newPost['postText'], $this->post->post_text);

        $response->assertStatus(200);
    }
}
