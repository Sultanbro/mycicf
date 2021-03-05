<?php

namespace Tests\Feature;

use Barryvdh\Debugbar\DataCollector\QueryCollector;
use Illuminate\Support\Str;
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

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $routeName = $this->getRouteName();
        $this->route = route($routeName);

        $this->reflection = new ReflectionClass(static::class);
        $this->cli = CLI::instance();
    }

    /**
     * @return mixed
     *
     */
    // abstract public function getRoute();
    abstract public function getRouteName();

    abstract public function handle();

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

    private function setPrefixToMeasureName() {
        return sprintf("[Test]: %s", $this->getMeasureName());
    }

    public function testExecute() {
        $cli = $this->cli;
        $measureName = $this->setPrefixToMeasureName();

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

            [, $action] = explode('@', $routes['controller']);

            $result .= sprintf("[%s /%s] as %s uses (%s)\n\tAction '%s' in %s\n\n\t%s\n\n",
                $cli->bold($cli->color($methods, CLI::CLI_COLOR_RED)),
                $cli->color($uri, CLI::CLI_COLOR_LIGHT_YELLOW),
                $cli->color($routes['as'], CLI::CLI_COLOR_LIGHT_YELLOW),
                $cli->color($routes['middleware'], CLI::CLI_COLOR_YELLOW),
                $cli->color($cli->bold($action), CLI::CLI_COLOR_RED),
                $cli->color($cli->bold($this->getFullPath($routes['file'])), CLI::CLI_COLOR_RED),
                '[ ' . $cli->underlined($cli->color($name, CLI::CLI_COLOR_YELLOW)) . ' ]'
            );
        }

        // $result .= sprintf("\t%s:\t\t%s\n",
        //     $this->cliLabel('Проверок'),
        //     $this->cliInt($this->getNumAssertions()));

        if ($collector->enabled('time')) {
            $time = $collector->getTime($measureName);

            $result .= sprintf("\t%s:\t\t\t%s\n",
                $cli->label('Timing'),
                $cli->time($time['duration']));

            $maxMeasureNameLength = collect($time['measures'])->max(function ($measure) {
                return strlen($measure['label']);
            });

            foreach ($time['measures'] as $measure) {

                $paddedLabel = str_pad($measure['label'], $maxMeasureNameLength + 1);

                if ($measure['label'] === $this->setPrefixToMeasureName()) {
                    $label = $cli->color($paddedLabel, CLI::CLI_COLOR_RED);
                } else {
                    $label = $cli->label($paddedLabel);
                }

                $result .= sprintf("\t\t%s:\t%s\n",
                    $label,
                    $cli->time($measure['duration'])
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

            $preparedQueries = [];
            $timings = [
                'app.services' => 0,
                'app.controllers' => 0,
                'app.other' => 0,
                'tests' => 0,
                'vendor' => 0
            ];
            $counts = [
                'app.services' => 0,
                'app.controllers' => 0,
                'app.other' => 0,
                'tests' => 0,
                'vendor' => 0
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
                } else {
                    dd(123312);
                }
            }

            $result .= sprintf("\t%s:\t\t  %s\n\t\ttests           : %s %s\n\t\tapp.services    : %s %s\n\t\tapp.controllers : %s %s\n\t\tapp.other       : %s %s\n\t\tvendor          : %s %s\n\n",
                $cli->label('SQL queries'),

                $cli->color(count($queries), CLI::CLI_COLOR_RED),

                $cli->int($counts['tests']),
                $cli->time($timings['tests']),

                $cli->int($counts['app.services']),
                $cli->time($timings['app.services']),

                $cli->int($counts['app.controllers']),
                $cli->time($timings['app.controllers']),

                $cli->int($counts['app.other']),
                $cli->time($timings['app.other']),

                $cli->int($counts['vendor']),
                $cli->time($timings['vendor'])
            );

            foreach ($preparedQueries as $index => $query) {
                switch ($query['query']['type']) {
                    case 'query':
                        $backtraceZero = $query['query']['backtrace'][0];
                        $source = $backtraceZero->name;
                        if ($query['type'] === 'tests') {
                            $type = $cli->color(' [tests]', CLI::CLI_COLOR_DARK_GRAY);
                        } else if ($query['type'] === 'app.services') {
                            $type = $cli->color('   [app.services]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.controllers') {
                            $type = $cli->color('   [app.controllers]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.other') {
                            $type = $cli->color('   [app.other]', CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'vendor') {
                            $type = $cli->color('[vendor]', CLI::CLI_COLOR_DARK_GRAY);
                        } else {
                            dd(123312);
                        }

                        switch ($query['type']) {
                            case 'tests':
                            case 'vendor':
                                $sql = $cli->color($query['query']['sql'], CLI::CLI_COLOR_DARK_GRAY);
                                break;

                            default:
                                $sql = $query['query']['sql'];
                        }

                        $result .= sprintf("\t\t%s %s %s\n",
                            $type,
                            $cli->time($query['query']['duration']),
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
                            $cli->label($query['query']['sql'])
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
                $cli->label('Models interaction'),
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
                $cli->label('Events'),
                $cli->int(count($events['measures'])),
                $cli->time($events['duration'])
            );

            $maxMeasureNameLength = collect($events['measures'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['measures'] as $event) {
                $paddedLabel = str_pad($event['label'], $maxMeasureNameLength + 1);
                $result .= sprintf("\t\t%s:\t%s\n",
                    $cli->label($paddedLabel),
                    $cli->time($event['duration'])
                );
            }

            $result .= "\n\n";
        }

        if ($collector->enabled('cache')) {
            $cache = $collector->getCache();

            $result .= sprintf("\t%s: %s (%s)\n",
                $cli->label('Cache'),
                $cli->int(count($cache['measures'])),
                $cli->time($cache['duration'])
            );

            foreach ($cache['measures'] as $measure) {
                $result .= sprintf("\t\t%s: (%s)\n",
                    $cli->label($measure['label']),
                    $cli->time($measure['duration'])
                );
            }

        }

        if ($collector->enabled('kias')) {
            $kias = $collector->getKias();

            $result .= sprintf("\n\t%s: %s\n",
                $cli->label('Kias'),
                $cli->int(count($kias))
            );

            foreach ($kias as $row) {
                $result .= sprintf("\t\t%s\n", $cli->label($row['method']));
            }

        }

        if ($collector->enabled('auth')) {
            $auth = $collector->getAuth();

            $user = auth()->user();
            $result .= sprintf("\n\t%s:\t%s (#%d)",
                $cli->label('Auth'),
                $auth['names'],
                (isset($user) ? $user->id : '')
            ); // TODO Не совсем верно
            $result .= "\n\n";
        }

        $classPath = $this->reflection->getFileName();

        $result .= sprintf("\nClass: %s\n\n", $classPath);

        $result .= " ================================= \n\n";

        echo $result;

        $this->cleanup();

    }

    protected function cleanup() {
    }
}
