<?php

namespace Tests\Feature\News;

use App\Post;
use App\User;
use DB;
use Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class AddPostTest extends TestCase {
    use WithFaker;

    public const ISN = '5565';

    private $route;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->route = route('news.addPost');
    }

    private function getUser($ISN = self::ISN) {
        $user = User::where('isn', '=', $ISN)->first();

        if ($user) {
            return $user;
        }

        $user = new User();
        $user->ISN = $ISN;
        $user->username = 'Test user';
        $user->password_hash = Hash::make('password');
        $user->level = 0;
        $user->short_name = 'test';
        $user->full_name = 'test';
        $user->session_id = 1;
        $user->dept_isn = '1';
        $user->save();

        return $user;
    }

    public function testAddPostWithNoAuth() {
        $response = $this->post($this->route, []);
        $response->assertStatus(302);
    }

    public function testAddPostWithNoData() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, [

        ]);
        $response->assertJson([
            'success' => false,
        ]);
    }

    public function testAddPostWithMinimalSetOfData() {
        $this->actingAs($this->getUser());
        $response = $this->post($this->route, []);
        $response->assertStatus(200);
    }

    public function testAddPostWithPostFiles() {
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
}
