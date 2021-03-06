<?php

namespace Tests\Feature;

use Barryvdh\Debugbar\DataCollector\QueryCollector;
use Illuminate\Support\Str;
use PHPUnit\Runner\BaseTestRunner;
use ReflectionClass;
use Tests\Collector;
use Tests\TestCase;

/**
 * Class FeatureTestBase
 * @package Tests\Feature
 *
 * Этот класс будет перенесён в отдельный пакет
 */
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

    /**
     * @var ReflectionClass
     */
    private $reflection;
    /**
     * @var Collector
     */
    private $collector;
    /**
     * @var string
     */
    private $measureName;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $routeName = $this->getRouteName();
        $this->route = route($routeName);

        $this->reflection = new ReflectionClass(static::class);
        $this->cli = CLI::instance();
        $this->collector = Collector::instance();
        $this->measureName = sprintf("[TestCase]: %s", $this->getMeasureName());

    }

    /**
     * @return mixed
     *
     */
    // abstract public function getRoute();
    abstract public function getRouteName();

    public function getMeasureName() {
        return static::class;
    }

    protected function prepare() {
    }

    protected function getFullPath($file) {
        [$path, $lines] = explode(':', $file);
        $path = ltrim($path, '/\\');
        return implode(':', [base_path($path), $lines]);
    }

    protected function setUp(): void {
        parent::setUp();
        $this->prepare();

        $this->collector->init();

        $this->collector->debugbar->startMeasure($this->measureName);

    }

    protected function printReport() {

        $name = $this->description ?? static::class;

        $result = '';

        if ($this->collector->enabled('route')) {
            $routes = $this->collector->getRoutes();

            [$methods, $uri] = explode(' ', $routes['uri']);

            $uri = ltrim($uri, '/');

            [, $action] = explode('@', $routes['controller']);

            $result .= sprintf("[%s /%s] as %s uses (%s)\n\tAction '%s' in %s\n\n\t%s\n\n",
                $this->cli->bold($this->cli->color($methods, CLI::CLI_COLOR_RED)),
                $this->cli->color($uri, CLI::CLI_COLOR_LIGHT_YELLOW),
                $this->cli->color($routes['as'], CLI::CLI_COLOR_LIGHT_YELLOW),
                $this->cli->color($routes['middleware'], CLI::CLI_COLOR_YELLOW),
                $this->cli->color($this->cli->bold($action), CLI::CLI_COLOR_RED),
                $this->cli->color($this->cli->bold($this->getFullPath($routes['file'])), CLI::CLI_COLOR_RED),
                '[ ' . $this->cli->underlined($this->cli->color($name, CLI::CLI_COLOR_YELLOW)) . ' ]'
            );
        }

        {
            $annotations = $this->getAnnotations();

            $class = $annotations['class'];
            if (! empty($class)) {
                $package = $class['package'] ?? [];
                $covers = $class['covers'] ?? [];

                $result .= sprintf("\t%s:\n", $this->cli->label('Annotations'));
                $result .= "\n";
                foreach ($package as $row) {
                    $result .= sprintf("%s %s\n",
                        $this->cli->color("\t\t@package", CLI::CLI_COLOR_GREEN),
                        $row
                    );
                }

                $result .= "\n";
                foreach ($covers as $row) {
                    $result .= sprintf("%s %s\n",
                        $this->cli->color("\t\t@covers", CLI::CLI_COLOR_GREEN),
                        $row
                    );
                }

                $result .= "\n\n";
            }
        }

        // $result .= sprintf("\t%s:\t\t%s\n",
        //     $this->cliLabel('Проверок'),
        //     $this->cliInt($this->getNumAssertions()));

        if ($this->collector->enabled('time')) {
            $time = $this->collector->getTime($this->measureName);

            $result .= sprintf("\t%s:\t\t\t%s\n",
                $this->cli->label('Timing'),
                $this->cli->time($time['duration']));

            $maxMeasureNameLength = collect($time['measures'])->max(function ($measure) {
                return strlen($measure['label']);
            });

            foreach ($time['measures'] as $measure) {

                $paddedLabel = str_pad($measure['label'], $maxMeasureNameLength + 1);

                if ($measure['label'] === $this->measureName) {
                    $label = $this->cli->color($paddedLabel, CLI::CLI_COLOR_BLUE);
                } else {
                    $label = $this->cli->label($paddedLabel);
                }

                $result .= sprintf("\t\t%s:\t%s\n",
                    $label,
                    $this->cli->time($measure['duration'])
                );
            }

            $result .= "\n";
        }

        if ($this->collector->enabled('queries')) {
            $queries = $this->collector->getQueries();

            /**
             * @var QueryCollector $col
             */
            $col = $this->collector->debugbar->getCollector('queries');

            $allQueriesDuration = collect($queries)->sum(function ($query) {
                return $query['duration'];
            });

            $preparedQueries = [];
            $timings = [
                'app.services'    => 0,
                'app.controllers' => 0,
                'app.middleware'  => 0,
                'app.other'       => 0,
                'tests'           => 0,
                'vendor'          => 0
            ];
            $counts = [
                'app.services'    => 0,
                'app.controllers' => 0,
                'app.middleware'  => 0,
                'app.other'       => 0,
                'tests'           => 0,
                'vendor'          => 0
            ];

            foreach ($queries as $index => $query) {
                $backtraceZero = $query['backtrace'][0];
                $source = $backtraceZero->name;
                if (Str::startsWith($source, '\\tests')) {
                    $preparedQueries[] = [
                        'type'  => 'tests',
                        'query' => $query
                    ];
                    $timings['tests'] += $query['duration'];
                    $counts['tests']++;
                } else if (Str::startsWith($source, '\\app')) {
                    if (Str::startsWith($source, '\\app\\Library\\Services')) {
                        $key = 'app.services';
                    } else if (Str::startsWith($source, '\\app\\Http\\Controllers')) {
                        $key = 'app.controllers';
                    } else {
                        $key = 'app.other';
                    }
                    $preparedQueries[] = [
                        'type'  => $key,
                        'query' => $query
                    ];
                    $timings[$key] += $query['duration'];
                    $counts[$key]++;
                } else if (Str::startsWith($source, '\\vendor')) {
                    $preparedQueries[] = [
                        'type'  => 'vendor',
                        'query' => $query
                    ];
                    $timings['vendor'] += $query['duration'];
                    $counts['vendor']++;
                } else if ($backtraceZero->namespace === 'middleware') {
                    $preparedQueries[] = [
                        'type'  => 'app.middleware',
                        'query' => $query
                    ];
                    $timings['app.middleware'] += $query['duration'];
                    $counts['app.middleware']++;
                } else {
                    dd(123312, $source);
                }
            }


            $result .= sprintf("\t%s:\t\t  %s\n",
                $this->cli->label('SQL queries'),
                $this->cli->color(count($queries), CLI::CLI_COLOR_RED)
            );

            $result .= sprintf("\t\ttests           : %s %s\n",
                $this->cli->int($counts['tests']),
                $this->cli->time($timings['tests'])
            );

            $result .= sprintf("\t\tapp.services    : %s %s\n",
                $this->cli->int($counts['app.services']),
                $this->cli->time($timings['app.services'])
            );

            $result .= sprintf("\t\tapp.middleware  : %s %s\n",
                $this->cli->int($counts['app.middleware']),
                $this->cli->time($timings['app.middleware'])
            );

            $result .= sprintf("\t\tapp.controllers : %s %s\n",
                $this->cli->int($counts['app.controllers']),
                $this->cli->time($timings['app.controllers'])
            );

            $result .= sprintf("\t\tapp.other       : %s %s\n",
                $this->cli->int($counts['app.other']),
                $this->cli->time($timings['app.other'])
            );

            $result .= sprintf("\t\tvendor          : %s %s\n",
                $this->cli->int($counts['vendor']),
                $this->cli->time($timings['vendor'])
            );

            foreach ($preparedQueries as $index => $query) {
                switch ($query['query']['type']) {
                    case 'query':
                        $backtraceZero = $query['query']['backtrace'][0];
                        $source = $backtraceZero->name;
                        if ($query['type'] === 'tests') {
                            $type = $this->cli->color(' [tests]', CLI::CLI_COLOR_DARK_GRAY);
                        } else if ($query['type'] === 'app.services') {
                            $type = $this->cli->color('   [app.services]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.controllers') {
                            $type = $this->cli->color('   [app.controllers]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.middleware') {
                            $type = $this->cli->color('   [app.middleware]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.other') {
                            $type = $this->cli->color('   [app.other]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'vendor') {
                            $type = $this->cli->color('[vendor]', CLI::CLI_COLOR_DARK_GRAY);
                        } else {
                            dd(111222);
                        }

                        switch ($query['type']) {
                            case 'tests':
                            case 'vendor':
                                $sql = $this->cli->color($query['query']['sql'], CLI::CLI_COLOR_DARK_GRAY);
                                break;

                            default:
                                $sql = $query['query']['sql'];
                        }

                        $result .= sprintf("\t\t%s %s %s\n",
                            $type,
                            $this->cli->time($query['query']['duration']),
                            $sql
                        );

                        if (config('testing.debugbar.collectors.queries.backtrace', false)) {
                            foreach ($query['query']['backtrace'] as $backtrace) {
                                $result .= sprintf("\t\t\t\tTRACE: %s:%s:%s\n",
                                    base_path(ltrim($backtrace->name, '\\/')),
                                    $backtrace->line,
                                    $backtrace->index
                                );
                            }
                        }

                        $result .= "\n";

                        break;

                    case 'transaction':
                        $result .= sprintf("\t\t%s\n",
                            $this->cli->label($query['query']['sql'])
                        );
                        break;

                    default:
                        dd($query);
                }
            }

            $result .= "\n";
        }

        if ($this->collector->enabled('models')) {
            $models = $this->collector->getModels();

            $result .= sprintf("\t%s: %s\n",
                $this->cli->label('Models interaction'),
                $this->cli->int($models['count'])
            );

            foreach ($models['data'] as $modelName => $count) {
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cli->label($modelName),
                    $this->cli->int($count)
                );
            }

            $result .= "\n";
        }

        if ($this->collector->enabled('events')) {
            $events = $this->collector->getEvents();

            $result .= sprintf("\t%s:\t%s\t%s\n",
                $this->cli->label('Events'),
                $this->cli->int(count($events['measures'])),
                $this->cli->time($events['duration'])
            );

            $maxMeasureNameLength = collect($events['measures'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['measures'] as $event) {
                $paddedLabel = str_pad($event['label'], $maxMeasureNameLength + 1);
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cli->label($paddedLabel),
                    $this->cli->time($event['duration'])
                );
            }

            $result .= "\n\n";
        }

        if ($this->collector->enabled('cache')) {
            $cache = $this->collector->getCache();

            $result .= sprintf("\t%s: %s (%s)\n",
                $this->cli->label('Cache'),
                $this->cli->int(count($cache['measures'])),
                $this->cli->time($cache['duration'])
            );

            foreach ($cache['measures'] as $measure) {
                $result .= sprintf("\t\t%s: (%s)\n",
                    $this->cli->label($measure['label']),
                    $this->cli->time($measure['duration'])
                );
            }

        }

        if ($this->collector->enabled('kias')) {
            $kias = $this->collector->getKias();

            $result .= sprintf("\n\t%s: %s\n",
                $this->cli->label('Kias'),
                $this->cli->int(count($kias))
            );

            foreach ($kias as $row) {
                $result .= sprintf("\t\t%s\n", $this->cli->label($row['method']));
            }

        }

        if ($this->collector->enabled('auth')) {
            $auth = $this->collector->getAuth();

            $user = auth()->user();
            $result .= sprintf("\n\t%s:\t%s (#%d)",
                $this->cli->label('Auth'),
                $auth['names'],
                (isset($user) ? $user->id : '')
            ); // TODO Не совсем верно
            $result .= "\n\n";
        }

        $classPath = $this->reflection->getFileName();

        $result .= sprintf("\nClass: %s\n\n", $classPath);
        $result .= " ================================= \n\n";

        echo $result;
    }

    protected function cleanup() {
    }

    protected function tearDown(): void {
        $this->collector->debugbar->stopMeasure($this->measureName);
        $this->cleanup();

        if ($this->getStatus() === BaseTestRunner::STATUS_PASSED) {
            $this->printReport();
        }

        parent::tearDown();
    }
}
