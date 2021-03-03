<?php

namespace Tests\Feature;

use Barryvdh\Debugbar\DataCollector\QueryCollector;
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
     *
     * @deprecated
     */
    protected $methods;

    /**
     * @var CLI
     */
    protected $cli;

    private $reflection;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $routeName = $this->getRouteName();
        $this->route = route($routeName);
        $route = \Route::getRoutes()->getByName($routeName);
        $this->methods = $route->methods();

        $this->reflection = new \ReflectionClass(static::class);
        $this->cli = CLI::instance();
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
        $measureName = $this->getMeasureName();

        $this->prepare();

        $collector = Collector::instance();
        $collector->init();

        $collector->debugbar->startMeasure($measureName);

        $this->handle();

        $collector->debugbar->stopMeasure($measureName);

        $name = $this->description ?? static::class;

        $result = '';

        if ($collector->enabled('route')) {
            $routes = $collector->getRoutes();

            [$methods, $uri] = explode(' ', $routes['uri']);

            $uri = ltrim($uri, '/');

            $result .= sprintf("[%s /%s] as %s uses (%s)\n\t=> %s\n\n\t%s\n\n",
                $this->cli->cliBold($this->cli->cliColor($methods, CLI::CLI_COLOR_RED)),
                $this->cli->cliColor($uri, CLI::CLI_COLOR_BLUE),
                $this->cli->cliColor($routes['as'], CLI::CLI_COLOR_BLUE),
                $this->cli->cliColor($routes['middleware'], CLI::CLI_COLOR_YELLOW),
                $this->cli->cliColor($this->cli->cliBold($routes['controller']), CLI::CLI_COLOR_RED),
                $this->cli->cliUnderlined($this->cli->cliColor($name, CLI::CLI_COLOR_YELLOW))
            );
        }

        // $result .= sprintf("\t%s:\t\t%s\n",
        //     $this->cliLabel('Проверок'),
        //     $this->cliInt($this->getNumAssertions()));

        if ($collector->enabled('time')) {
            $time = $collector->getTime($measureName);

            $duration_str = $time['duration_str'];

            $result .= sprintf("\t%s:\t\t\t%s\n",
                $this->cli->cliLabel('Время'),
                $this->cli->cliTime($duration_str));

            foreach ($time['measures'] as $measure) {
                $result .= sprintf("\t\t%s:\t%s\n", $measure['label'], $measure['duration_str']);
            }

            $result .= "\n";

        }

        if ($collector->enabled('queries')) {
            $queries = $collector->getQueries();


            /**
             * @var QueryCollector $col
             */
            $col = $collector->debugbar->getCollector('queries');

            //

            $allQueriesDuration = collect($queries)->sum(function ($query) {
                return $query['duration'];
            });

            $result .= sprintf("\t%s (%s):\t%s\n",
                $this->cli->cliLabel('SQL-запросы'),
                $this->cli->cliTime($col->formatDuration($allQueriesDuration)),
                $this->cli->cliColor(count($queries), CLI::CLI_COLOR_RED)
            );

            foreach ($queries as $query) {
                switch ($query['type']) {
                    case 'query':
                        $result .= sprintf("\t\t%' 6s %s\n",
                            $this->cli->cliTime('[' . $query['duration_str'] . ']'),
                            $query['sql']
                        );
                        break;

                    case 'transaction':
                        $result .= sprintf("\t\t%s\n",
                            $this->cli->cliLabel($query['sql'])
                        );
                        break;

                    default:
                        dd($query);
                }
            }

            $result .= "\n";
        }

        if ($collector->enabled('models')) {
            $models = $collector->getModels();
            $result .= sprintf("\t%s: %s\n",
                $this->cli->cliLabel('Обращения к моделям'),
                $this->cli->cliInt($models['count'])
            );

            foreach ($models['data'] as $modelName => $count) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cli->cliLabel($modelName),
                    $this->cli->cliInt($count)
                );
            }

            $result .= "\n";
        }

        if ($collector->enabled('events')) {
            $events = $collector->getEvents();

            $result .= sprintf("\t%s:\t%s\t%s\n",
                $this->cli->cliColor('События', CLI::CLI_COLOR_GREEN),
                $this->cli->cliInt(count($events['measures'])),
                $this->cli->cliColor($events['duration_str'], CLI::CLI_COLOR_BLUE)
            );

            $maxEventNameLength = collect($events['measures'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['measures'] as $event) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cli->cliLabel($event['label']),
                    $this->cli->cliTime($event['duration_str'])
                );
            }

            $result .= "\n\n";
        }

        if ($collector->enabled('cache')) {
            $cache = $collector->getCache();

            $result .= sprintf("\t%s: %s (%s)\n",
                $this->cli->cliLabel('Кэш'),
                $this->cli->cliInt(count($cache['measures'])),
                $this->cli->cliTime($cache['duration_str'])
            );

            foreach ($cache['measures'] as $measure) {
                $result .= sprintf("\t\t%s: (%s)\n",
                    $this->cli->cliLabel($measure['label']),
                    $this->cli->cliTime($measure['duration_str'])
                );
            }

        }

        if ($collector->enabled('auth')) {
            $auth = $collector->getAuth();

            $user = auth()->user();
            $result .= sprintf("\n\t%s:\t%s (#%d)",
                $this->cli->cliLabel('Авторизация'),
                $auth['names'],
                (isset($user) ? $user->id : '')
            ); // TODO Не совсем верно
            $result .= "\n\n";
        }

        $classPath = $this->reflection->getFileName();

        $result .= sprintf("\nКласс: %s\n\n", $classPath);

        $result .= " ================================= \n\n";

        echo $result;

        $this->cleanup();

    }
}
