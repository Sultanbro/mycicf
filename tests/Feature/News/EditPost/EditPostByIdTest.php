<?php

namespace Tests\Feature\News\EditPost;

use App\Post;

class EditPostByIdTest extends EditPostTestBase {

    protected $description = 'Правим пост по ID';

    public function testExecute() {
        $user = $this->getUser();
        $this->actingAs($user);

        $postId = $this->post->id;
        $post = Post::whereId($postId)->first();
        $this->assertEquals($post->post_text, $this->postText);

        $newText = 'Hello world';

        $response = $this->post($this->route, [
            'postId' => $postId,
            'postText' => $newText
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'edited' => true,
        ]);
        $post = Post::whereId($postId)->first();
        $this->assertEquals($newText, $post->post_text);
    }

    public function getMeasureName() {
        return 'Edit the post';
    }
}
