<?php

namespace Tests\Feature\News\AddPost;

use Tests\WithUser;

class AddPostWithPollTest extends AddPostTestBase {
    use WithUser;

    protected $description = 'Создаём пост с опросом';

    public const ISN = '5565';

    public function handle() {
        $this->markTestSkipped('TODO: Complete this test.');
    }

    public function getMeasureName() {
        return 'Add post with poll';
    }
}
