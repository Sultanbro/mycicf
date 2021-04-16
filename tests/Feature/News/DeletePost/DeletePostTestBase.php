<?php

namespace Tests\Feature\News\DeletePost;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

abstract class DeletePostTestBase extends FeatureTestBase {
    use WithFaker;

    public const ISN = '1144';

    public function getRouteName() {
        return 'news.my.deletePost';
    }
}
