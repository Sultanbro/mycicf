<?php

namespace Tests;

use Barryvdh\Debugbar\DataCollector\EventCollector;
use Barryvdh\Debugbar\DataCollector\ModelsCollector;
use Barryvdh\Debugbar\DataCollector\QueryCollector;
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

        $this->debugbar->enable();
    }

    public function getTime($message) {
        /**
         * @var TimeDataCollector $collector
         */
        $collector = $this->debugbar->getCollector('time');

        return collect($collector->getMeasures())->first(function ($row) use ($message) {
            return $row['label'] === $message;
        });
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
}
