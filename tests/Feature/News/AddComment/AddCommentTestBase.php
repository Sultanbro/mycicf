<?php

namespace Tests\Feature\News\AddComment;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

abstract class AddCommentTestBase extends FeatureTestBase {
    use WithFaker;

    public const ISN = '5565';

    public function getRouteName() {
        return 'news.addComment';
    }
}
