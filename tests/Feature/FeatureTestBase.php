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

    public function testRun() {
        $cli = $this->cli;
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

            $result .= sprintf("[%s /%s] as %s uses (%s)\n\tin %s\n\n\t%s\n\n",
                $cli->bold($cli->color($methods, CLI::CLI_COLOR_RED)),
                $cli->color($uri, CLI::CLI_COLOR_BLUE),
                $cli->color($routes['as'], CLI::CLI_COLOR_BLUE),
                $cli->color($routes['middleware'], CLI::CLI_COLOR_YELLOW),
                $cli->color($cli->bold($routes['file']), CLI::CLI_COLOR_RED),
                $cli->underlined($cli->color($name, CLI::CLI_COLOR_YELLOW))
            );
        }

        // $result .= sprintf("\t%s:\t\t%s\n",
        //     $this->cliLabel('Проверок'),
        //     $this->cliInt($this->getNumAssertions()));

        if ($collector->enabled('time')) {
            $time = $collector->getTime($measureName);

            $duration_str = $time['duration_str'];

            $result .= sprintf("\t%s:\t\t\t%s\n",
                $cli->label('Время'),
                $cli->time($duration_str));

            $maxMeasureNameLength = collect($time['measures'])->max(function ($measure) {
                return strlen($measure['label']);
            });

            foreach ($time['measures'] as $measure) {
                $paddedLabel = str_pad($measure['label'],$maxMeasureNameLength + 1);
                $result .= sprintf("\t\t%s:\t%s\n",
                    $cli->label($paddedLabel),
                    $cli->time($measure['duration_str'])
                );
            }

            $result .= "\n";
        }

        if ($collector->enabled('queries')) {
            $queries = $collector->getQueries();

            /**
             * @var QueryCollector $col
             */
            $col = $collector->debugbar->getCollector('queries');

            $allQueriesDuration = collect($queries)->sum(function ($query) {
                return $query['duration'];
            });

            $result .= sprintf("\t%s (%s):\t%s\n",
                $cli->label('SQL-запросы'),
                $cli->time($col->formatDuration($allQueriesDuration)),
                $cli->color(count($queries), CLI::CLI_COLOR_RED)
            );

            foreach ($queries as $query) {
                switch ($query['type']) {
                    case 'query':
                        $result .= sprintf("\t\t%' 6s %s\n",
                            $cli->time('[' . $query['duration_str'] . ']'),
                            $query['sql']
                        );
                        break;

                    case 'transaction':
                        $result .= sprintf("\t\t%s\n",
                            $cli->label($query['sql'])
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
                $cli->label('Обращения к моделям'),
                $cli->int($models['count'])
            );

            foreach ($models['data'] as $modelName => $count) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $cli->label($modelName),
                    $cli->int($count)
                );
            }

            $result .= "\n";
        }

        if ($collector->enabled('events')) {
            $events = $collector->getEvents();

            $result .= sprintf("\t%s:\t%s\t%s\n",
                $cli->label('События'),
                $cli->int(count($events['measures'])),
                $cli->time($events['duration_str'])
            );

            $maxMeasureNameLength = collect($events['measures'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['measures'] as $event) {
                $paddedLabel = str_pad($event['label'],$maxMeasureNameLength + 1);
                $result .= sprintf("\t\t%s:\t%s\n",
                    $cli->label($paddedLabel),
                    $cli->time($event['duration_str'])
                );
            }

            $result .= "\n\n";
        }

        if ($collector->enabled('cache')) {
            $cache = $collector->getCache();

            $result .= sprintf("\t%s: %s (%s)\n",
                $cli->label('Кэш'),
                $cli->int(count($cache['measures'])),
                $cli->time($cache['duration_str'])
            );

            foreach ($cache['measures'] as $measure) {
                $result .= sprintf("\t\t%s: (%s)\n",
                    $cli->label($measure['label']),
                    $cli->time($measure['duration_str'])
                );
            }

        }

        if ($collector->enabled('auth')) {
            $auth = $collector->getAuth();

            $user = auth()->user();
            $result .= sprintf("\n\t%s:\t%s (#%d)",
                $cli->label('Авторизация'),
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

    protected function cleanup() {
    }
}
