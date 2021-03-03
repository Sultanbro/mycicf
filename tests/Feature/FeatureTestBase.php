<?php

namespace Tests\Feature;

use Tests\Collector;
use Tests\TestCase;

abstract class FeatureTestBase extends TestCase {
    protected $route;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->route = route('news.getPosts');
    }

    abstract public function getRoute();

    abstract public function getMeasureName();

    abstract public function handle();

    public function testRun() {
        Collector::instance()->init();
        $measureName = $this->getMeasureName();
        Collector::instance()->debugbar->startMeasure($measureName);

        $this->handle();

        Collector::instance()->debugbar->stopMeasure($measureName);

        $duration_str = Collector::instance()->getTime($measureName)['duration_str'];

        dump(static::class . ': ' . $duration_str);
    }
}
