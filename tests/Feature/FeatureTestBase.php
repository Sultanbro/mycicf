<?php

namespace Tests\Feature;

use Barryvdh\Debugbar\DataCollector\QueryCollector;
use Tests\Collector;
use Tests\TestCase;

abstract class FeatureTestBase extends TestCase {
    // https://misc.flogisoft.com/bash/tip_colors_and_formatting
    private const CLI_STYLE_BOLD = 1;
    private const CLI_STYLE_UNDERLINED = 4;
    private const CLI_COLOR_RED = 31;
    private const CLI_COLOR_GREEN = 32;
    private const CLI_COLOR_YELLOW = 33;
    private const CLI_COLOR_BLUE = 34;

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

    protected $enableColors = true;

    private $reflection;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $routeName = $this->getRouteName();
        $this->route = route($routeName);
        $route = \Route::getRoutes()->getByName($routeName);
        $this->methods = $route->methods();

        $this->reflection = new \ReflectionClass(static::class);
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

    private function cliColor(string $string, int $color) {
        // https://misc.flogisoft.com/bash/tip_colors_and_formatting
        if (! $this->enableColors) {
            return $string;
        }
        return "\e[${color}m${string}\e[0m";
    }

    private function cliTime($value) {
        return $this->cliColor($value, self::CLI_COLOR_BLUE);
    }

    private function cliLabel($value) {
        return $this->cliColor($value, self::CLI_COLOR_GREEN);
    }

    private function cliInt($value) {
        return $this->cliColor($value, self::CLI_COLOR_RED);
    }

    private function cliBold($value) {
        return $this->cliColor($value, self::CLI_STYLE_BOLD);
    }

    private function cliUnderlined($value) {
        return $this->cliColor($value, self::CLI_STYLE_UNDERLINED);
    }

    public function testRun() {
        $measureName = $this->getMeasureName();

        $this->prepare();

        $collector = Collector::instance();
        $collector->init();

        $collector->debugbar->startMeasure($measureName);

        $this->handle();

        $collector->debugbar->stopMeasure($measureName);

        $duration_str = $collector->getTime($measureName)['duration_str'];

        $name = $this->description ?? static::class;

        $result = '';

        if ($collector->enabled('route')) {
            $routes = $collector->getRoutes();

            [$methods, $uri] = explode(' ', $routes['uri']);

            $uri = ltrim($uri, '/');

            $result .= sprintf("[%s /%s] as %s (%s)\n\t=> %s\n\n\t%s\n\n",
                $this->cliBold($this->cliColor($methods, self::CLI_COLOR_RED)),
                $this->cliColor($uri, self::CLI_COLOR_BLUE),
                $this->cliColor($routes['as'], self::CLI_COLOR_BLUE),
                $this->cliColor($routes['middleware'], self::CLI_COLOR_YELLOW),
                $this->cliColor($this->cliBold($routes['controller']), self::CLI_COLOR_RED),
                $this->cliUnderlined($this->cliColor($name, self::CLI_COLOR_YELLOW))
            );
        }

        // $result .= sprintf("\t%s:\t\t%s\n",
        //     $this->cliLabel('Проверок'),
        //     $this->cliInt($this->getNumAssertions()));

        $result .= sprintf("\t%s:\t\t\t%s\n\n",
            $this->cliLabel('Время'),
            $this->cliTime($duration_str));

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
                $this->cliLabel('SQL-запросы'),
                $this->cliTime($col->formatDuration($allQueriesDuration)),
                $this->cliColor(count($queries), self::CLI_COLOR_RED)
            );

            foreach ($queries as $query) {
                switch ($query['type']) {
                    case 'query':
                        $result .= sprintf("\t\t%' 6s %s\n",
                            $this->cliTime('[' . $query['duration_str'] . ']'),
                            $query['sql']
                        );
                        break;

                    case 'transaction':
                        $result .= sprintf("\t\t%s\n",
                            $this->cliLabel($query['sql'])
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
                $this->cliLabel('Обращения к моделям'),
                $this->cliInt($models['count'])
            );

            foreach ($models['data'] as $modelName => $count) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cliLabel($modelName),
                    $this->cliInt($count)
                );
            }

            $result .= "\n";
        }

        if ($collector->enabled('events')) {
            $events = $collector->getEvents();

            $result .= sprintf("\t%s:\t%s\t%s\n",
                $this->cliColor('События', self::CLI_COLOR_GREEN),
                $this->cliInt(count($events['measures'])),
                $this->cliColor($events['duration_str'], self::CLI_COLOR_BLUE)
            );

            $maxEventNameLength = collect($events['measures'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['measures'] as $event) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cliLabel($event['label']),
                    $this->cliTime($event['duration_str'])
                );
            }

            $result .= "\n\n";
        }

        if ($collector->enabled('cache')) {
            $cache = $collector->getCache();

            $result .= sprintf("\t%s: %s (%s)\n",
                $this->cliLabel('Кэш'),
                $this->cliInt(count($cache['measures'])),
                $this->cliTime($cache['duration_str'])
            );

            foreach ($cache['measures'] as $measure) {
                $result .= sprintf("\t\t%s: (%s)\n",
                    $this->cliLabel($measure['label']),
                    $this->cliTime($measure['duration_str'])
                );
            }

        }

        if ($collector->enabled('auth')) {
            $auth = $collector->getAuth();

            $user = auth()->user();
            $result .= sprintf("\t%s:\t%s (#%d)",
                $this->cliLabel('Авторизация'),
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
