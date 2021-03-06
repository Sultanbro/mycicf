<?php

namespace Tests;

use Dotenv\Dotenv;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase {
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare() {
        // https://coderoad.ru/48070169/PhpStorm-Laravel-%D0%A1%D1%83%D0%BC%D0%B5%D1%80%D0%BA%D0%B8-w-%D1%82%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D0%B1%D0%B0%D0%B7%D0%B0-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85
        copy(static::basePath('.env'), static::basePath('.env.backup'));
        copy(static::basePath('.env.dusk.local'), static::basePath('.env'));
        $dotenv = Dotenv::create(base_path());
        $dotenv->overload();

        if (! static::runningInSail()) {
            static::startChromeDriver();
        }
    }

    public static function closeAll() {
        copy(static::basePath('.env.backup'), static::basePath('.env'));
        unlink(static::basePath('.env.backup'));
        $dotenv = Dotenv::create(base_path());
        $dotenv->overload();
        parent::closeAll();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return RemoteWebDriver
     */
    protected function driver() {
        $options = (new ChromeOptions)->addArguments(collect([
            '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function ($items) {
            return $items->merge([
                '--disable-gpu',
                '--headless',
            ]);
        })->all());

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     *
     * @return bool
     */
    protected function hasHeadlessDisabled() {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
            isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    public static function basePath($path = '') {
        return __DIR__ . '/../' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
