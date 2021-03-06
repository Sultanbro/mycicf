<?php

namespace Tests\Feature\News\AddPost;

use App\User;
use DB;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\WithUser;

class AddPostWithPostFilesTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с загруженными файлами';

    /**
     * @var User
     */
    protected $user;
    /**
     * @var Filesystem
     */
    private $storage;
    /**
     * @var mixed
     */
    private $postId;
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $postPath;

    protected function prepare() {
        $this->user = $this->getUser();
    }

    public function testExecute() {
        // TODO Сделать аналогичные тесты для postVideos, postDocuments

        $this->storage = Storage::fake('local');
        $this->actingAs($this->user);
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

        $this->postId = $response->json('postId');

        self::assertGreaterThan(0, $this->postId);
        $response->assertStatus(200);
        $this->postPath = "public/post_files/$this->postId";
        $this->path = "$this->postPath/images/$fileName";
        self::assertTrue($this->storage->exists($this->postPath));
        self::assertTrue($this->storage->exists($this->path));
    }

    protected function cleanup() {
        // Post::whereId($postId)->delete();
        DB::delete('DELETE FROM posts WHERE id = ?', [$this->postId]);
        $this->storage->delete($this->path);
        $this->storage->delete($this->postPath);
    }

    public function getMeasureName() {
        return 'Add post with post files';
    }
}
