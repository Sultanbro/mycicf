<?php

namespace Tests\Feature\News\Comments\AddComment;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;

abstract class AddCommentTestBase extends FeatureTestBase {
    use WithFaker;

    public const ISN = '1144';

    public function getRouteName() {
        return 'news.comments.add';
    }
}