<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

/**
 * Class AddPostWithPollTest
 * @package Tests\Feature\News\AddPost
 * @covers \App\Http\Controllers\News\PostsController::addPost
 */
class AddPostWithPollTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с опросом';

    public const ISN = '1144';

    public function testExecute() {
        // https://phpunit.readthedocs.io/ru/latest/incomplete-and-skipped-tests.html#incomplete-and-skipped-tests-incomplete-tests
        self::markTestSkipped('TODO: Complete this test.');
    }

    public function getMeasureName() {
        return 'Add post with poll';
    }
}
