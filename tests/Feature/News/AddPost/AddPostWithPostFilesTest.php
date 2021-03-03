<?php

namespace Tests\Feature\News\AddPost;

use DB;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\WithUser;

class AddPostWithPostFilesTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с загруженными файлами';

    public function handle() {
        // TODO Сделать аналогичные тесты для postVideos, postDocuments

        $storage = Storage::fake('local');
        $this->actingAs($this->getUser());
        $fileName = 'file.jpg';
        $file = UploadedFile::fake()->image($fileName);
        $response = $this->post($this->route, [
            'isn' => self::ISN,
            'postText' => $this->faker->text(20),
            'postFiles' => [
                $file,
                $file,
            ]
        ]);

        $postId = $response->json('postId');

        $this->assertGreaterThan(0, $postId);
        $response->assertStatus(200);
        $postPath = "public/post_files/$postId";
        $path = "$postPath/images/$fileName";
        $this->assertTrue($storage->exists($postPath));
        $this->assertTrue($storage->exists($path));
        // Post::whereId($postId)->delete();
        DB::delete('DELETE FROM posts WHERE id = ?', [$postId]);
        $storage->delete($path);
        $storage->delete($postPath);
    }

    public function getMeasureName() {
        return 'Add post with post files';
    }
}
