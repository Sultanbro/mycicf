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

    /**
     * @var string[]
     */
    protected $methods;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $routeName = $this->getRouteName();
        $this->route = route($routeName);
        $route = \Route::getRoutes()->getByName($routeName);
        $this->methods = $route->methods();
    }

    /**
     * @return mixed
     *
     */
    // abstract public function getRoute();
    abstract public function getRouteName();

    abstract public function getMeasureName();

    abstract public function handle();

    protected function prepare() {
    }

    protected function cleanup() {
    }

    public function testRun() {
        $collector = Collector::instance();
        $collector->init();
        $measureName = $this->getMeasureName();

        $this->prepare();

        $collector->debugbar->startMeasure($measureName);

        $this->handle();

        $collector->debugbar->stopMeasure($measureName);

        $this->cleanup();

        $events = $collector->getEvents();

        $duration_str = $collector->getTime($measureName)['duration_str'];

        $name = $this->description ?? static::class;
        $joinedMethods = implode(', ', $this->methods);
        $result = sprintf("[%s %s] %s:\n", $joinedMethods, $this->route, $name);
        $result .= sprintf("\tВремя:\t\t\t%s\n", $duration_str);

        if ($collector->enabled('queries')) {
            $queries = $collector->getQueries();
            $result .= sprintf("\tSQL-запросы:\t%s\n\n", count($queries));
        }

        if ($collector->enabled('models')) {
            $models = $collector->getModels();
            $result .= sprintf("\tОбращения к моделям:\t%s\n", $models['count']);

            foreach ($models['data'] as $modelName => $count) {
                $result .= sprintf("\t\t%s:\t%s\n", $modelName, $count);
            }

            $result .= "\n\n";
        }

        if ($collector->enabled('events')) {
            $result .= sprintf("\tСобытия:\t%s\t%s\n", count($events['measures']), $events['duration_str']);

            foreach ($events['measures'] as $event) {
                $result .= sprintf("\t\t%s:\t%s\n", $event['label'], $event['duration_str']);
            }

            $result .= "\n\n";
        }

        echo $result;
    }
}
