<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithPollTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с опросом';

    public const ISN = '1144';

    public function testExecute() {
        self::markTestSkipped('TODO: Complete this test.');
    }

    public function getMeasureName() {
        return 'Add post with poll';
    }
}
