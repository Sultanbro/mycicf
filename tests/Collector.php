<?php

namespace Tests;

use App\Debug\KiasRequestCollector;
use Barryvdh\Debugbar\DataCollector\CacheCollector;
use Barryvdh\Debugbar\DataCollector\EventCollector;
use Barryvdh\Debugbar\DataCollector\ModelsCollector;
use Barryvdh\Debugbar\DataCollector\MultiAuthCollector;
use Barryvdh\Debugbar\DataCollector\QueryCollector;
use Barryvdh\Debugbar\DataCollector\RouteCollector;
use Barryvdh\Debugbar\LaravelDebugbar;
use DebugBar\DataCollector\TimeDataCollector;

class Collector {
    /**
     * @var Collector
     */
    private static $instance;

    /**
     * @var LaravelDebugbar
     */
    public $debugbar;

    public $collectors = [];

    public static function instance() {
        if (empty(self::$instance)) {
            self::$instance = app(self::class);
        }

        return self::$instance;
    }

    public function __construct() {
    }

    public function enabled(string $name) {
        return isset($this->collectors[$name]) && $this->collectors[$name] === true;
    }

    public function init() {
        $this->debugbar = app(LaravelDebugbar::class);
        if (config('testing.debugbar.collect.queries')) {
            $this->debugbar->shouldCollect('queries');
            $this->collectors['queries'] = true;
        }

        if (config('testing.debugbar.collect.models')) {
            $this->debugbar->shouldCollect('models');
            $this->collectors['models'] = true;
        }

        if (config('testing.debugbar.collect.events')) {
            $this->debugbar->shouldCollect('events');
            $this->collectors['events'] = true;
        }

        if (config('testing.debugbar.collect.auth')) {
            $this->debugbar->shouldCollect('auth');
            $this->collectors['auth'] = true;
        }

        if (config('testing.debugbar.collect.route')) {
            $this->debugbar->shouldCollect('route');
            $this->collectors['route'] = true;
        }

        if (config('testing.debugbar.collect.cache')) {
            $this->debugbar->shouldCollect('cache');
            $this->collectors['cache'] = true;
        }

        if (config('testing.debugbar.collect.time')) {
            $this->debugbar->shouldCollect('time');
            $this->collectors['time'] = true;
        }

        if (config('testing.debugbar.collect.kias')) {
            $this->debugbar->shouldCollect('kias');
            $this->collectors['kias'] = true;
        }

        $this->debugbar->enable();

        return $this;
    }

    public function getTime($message) {
        /**
         * @var TimeDataCollector $collector
         */
        $collector = $this->debugbar->getCollector('time');

        return $collector->collect();
    }

    public function getQueries() {
        /**
         * @var QueryCollector $collector
         */
        $collector = $this->debugbar->getCollector('queries');

        return $collector->collect()['statements'];
    }

    public function getModels() {
        /**
         * @var ModelsCollector $collector
         */
        $collector = $this->debugbar->getCollector('models');

        return $collector->collect();
    }

    public function getEvents() {

        /**
         * @var $collector EventCollector;
         */
        $collector = $this->debugbar->getCollector('event');

        return $collector->collect();
    }

    public function getAuth() {

        /**
         * @var $collector MultiAuthCollector;
         */
        $collector = $this->debugbar->getCollector('auth');

        return $collector->collect();
    }

    public function getRoutes() {
        /**
         * @var $collector RouteCollector;
         */
        $collector = $this->debugbar->getCollector('route');

        return $collector->collect();
    }

    public function getCache() {
        /**
         * @var $collector CacheCollector;
         */
        $collector = $this->debugbar->getCollector('cache');

        return $collector->collect();
    }

    public function getKias() {
        /**
         * @var $collector KiasRequestCollector;
         */
        $collector = $this->debugbar->getCollector('kias');

        return $collector->collect();
    }
}
