<?php

namespace Tests\Feature\News\AddPost;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

abstract class AddPostTestBase extends FeatureTestBase {
    use WithFaker;

    public const ISN = '5565';

    public function getRoute() {
        return route('news.addPost');
    }
}
