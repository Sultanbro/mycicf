<?php

namespace Tests\Feature;

use Tests\Collector;
use Tests\TestCase;

abstract class FeatureTestBase extends TestCase {

    /**
     * @var string|null
     */
    protected $description;

    protected $route;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->route = $this->getRoute();
    }

    abstract public function getRoute();

    abstract public function getMeasureName();

    abstract public function handle();

    protected function prepare() {}
    protected function cleanup() {}

    public function testRun() {
        Collector::instance()->init();
        $measureName = $this->getMeasureName();

        $this->prepare();

        Collector::instance()->debugbar->startMeasure($measureName);

        $this->handle();

        Collector::instance()->debugbar->stopMeasure($measureName);

        $this->cleanup();

        $queries = Collector::instance()->getQueries();

        $duration_str = Collector::instance()->getTime($measureName)['duration_str'];

        $name = $this->description ?? static::class;
        $result = sprintf("[%s] %s:\n\t%s\n\t%s sql queries\n\n", $this->getRoute(), $name, $duration_str, count($queries));
        echo $result;
    }
}
