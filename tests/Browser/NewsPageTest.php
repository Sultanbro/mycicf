<?php

namespace Tests\Browser;

use App\Post;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Throwable;

class NewsPageTest extends DuskTestCase {

    /**
     * @var string
     */
    private $postText = 'text';

    /**
     * @var Post
     */
    private $post;

    protected function setUp(): void {
        // $this->post = new Post();
        // $this->post->user_isn = '99991';
        // $this->post->pinned = false;
        // $this->post->post_text = $this->postText;
        // $this->post->save();
    }

    /**
     * A basic browser test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testNewsPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                ->assertPathIs('/')
                ->waitFor('#username');

            $browser->type('#username', '1')
                ->type('#password', '1')
                ->press('.login-form .btn-block')
                ->waitForReload()
                ->assertPathIs('/news');
            $logo = $browser->element('.header-img-width a img');
            $this->assertNotNull($logo);
            $logoSrc = $logo->getAttribute('src');
            $this->assertStringEndsWith('/images/mycic-horizontal-logo.png', $logoSrc);
        });
    }

    protected function tearDown(): void {
        // $this->post->forceDelete();
    }
}
