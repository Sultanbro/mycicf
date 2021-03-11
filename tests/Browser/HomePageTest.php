<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Throwable;

class HomePageTest extends DuskTestCase {
    /**
     * A basic browser test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testHomePage() {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage());

            $loginDiv = $browser->element('#login');
            $this->assertNotNull($loginDiv);

            $welcome = $loginDiv->findElement(WebDriverBy::cssSelector('.title__welcome'));
            $this->assertEquals('Добро пожаловать в', $welcome->getText());
            $main = $loginDiv->findElement(WebDriverBy::cssSelector('.title__main'));
            $this->assertEquals('my.cic.kz', $main->getText());

            $browser->screenshot('home-page');
        });
    }
}
