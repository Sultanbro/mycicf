<?php

namespace Tests;

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

    public static function instance() {
        if (empty(self::$instance)) {
            self::$instance = app(self::class);
        }

        return self::$instance;
    }

    public function __construct() {
    }

    public function init() {
        if (config('testing.debugbar.collect.db')) {
            $this->debugbar = app(LaravelDebugbar::class);
            $this->debugbar->shouldCollect('queries');
        }
        $this->debugbar->shouldCollect('events');
        $this->debugbar->enable();
    }

    public function collect() {
        $result = [];

        if (config('testing.debugbar.collect.db')) {
            $result['queries'] = collect($this->debugbar->getCollector('queries')->collect()['statements'])
                ->map(function ($row) {
                    return $row['sql'];
                });
        }

        return $result;
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
}
