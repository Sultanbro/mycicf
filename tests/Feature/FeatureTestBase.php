<?php

namespace Tests\Feature;

use App\Http\Kernel;
use Barryvdh\Debugbar\DataCollector\QueryCollector;
use File;
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

    protected function printHTMLReport() {
        $name = $this->description ?? static::class;

        $html = view('testing.feature.report', [
            'name' => $name
        ]);

        $filename = str_replace(['/', '\\'], '__', static::class) . '.html';
        $path = base_path('tests/reports/' . $filename);
        File::put($path, $html);
    }

    protected function collectReportData() {
        $name = $this->description ?? static::class;

        $result = [
            'name'           => $name,
            'assertionCount' => $this->count(),
        ];

        if ($this->collector->enabled('route')) {
            $routes = $this->collector->getRoutes();
            [$methods, $uri] = explode(' ', $routes['uri']);
            $uri = ltrim($uri, '/');
            [, $action] = explode('@', $routes['controller']);

            $kernel = app(Kernel::class);
            $routeMiddleware = $kernel->getRouteMiddleware();

            $middleware = collect(explode(',', $routes['middleware']))
                ->keyBy(function ($name) {
                    return trim($name);
                })
                ->map(function ($mw) {
                    return trim($mw);
                })
                ->map(function ($mw) use ($routeMiddleware) {
                    return $routeMiddleware[$mw] ?? '';
                })
                ->map(function ($cls) {
                    if (empty($cls)) {
                        return '';
                    }
                    $reflectionClass = new ReflectionClass($cls);
                    $method = $reflectionClass->getMethod('handle');
                    return [
                        'file' => $reflectionClass->getFileName(),
                        'line' => $method->getStartLine()
                    ];
                });

            $file = $routes['file'];
            if (preg_match('%^(?P<path>[/\\\\a-zA-Z.]+):(?P<from>\d+)-(?P<to>\d+)$%im', $file, $regs)) {
                $from = (int)$regs['from'];
                $to = (int)$regs['to'];
                $controller = [
                    'path'     => $regs['path'],
                    'location' => [
                        'from'  => $from,
                        'to'    => $to,
                        'count' => $to - $from,
                    ]
                ];
            } else {
                $controller = [
                    'path' => $file,
                ];
            }

            $result['routes'] = [
                'routes'     => $routes,
                'methods'    => $methods,
                'uri'        => $uri,
                'action'     => $action,
                'middleware' => $middleware,
                'controller' => $controller,
            ];
        }

        {
            $result['annotations'] = [];
            $annotations = $this->getAnnotations();
            $class = $annotations['class'];

            if (! empty($class)) {
                $package = $class['package'] ?? [];
                $covers = $class['covers'] ?? [];

                $result['annotations']['class'] = $class;
                $result['annotations']['package'] = $package;
                $result['annotations']['covers'] = $covers;
            }
        }

        if ($this->collector->enabled('time')) {
            $time = $this->collector->getTime($this->measureName);
            $result['time'] = [
                'measures' => [],
                'duration' => $time['duration']
            ];

            foreach ($time['measures'] as $measure) {
                if ($measure['label'] === $this->measureName) {
                    $label = [
                        'label'     => $measure['label'],
                        'highlight' => true
                    ];
                } else {
                    $label = [
                        'label'     => $measure['label'],
                        'highlight' => false,
                    ];
                }

                $result['time']['measures'][] = [
                    'label'    => $label,
                    'duration' => $measure['duration'],
                ];
            }
        }

        if ($this->collector->enabled('queries')) {
            $queries = $this->collector->getQueries();
            $preparedQueries = [];

            /**
             * @var QueryCollector $col
             */
            $col = $this->collector->debugbar->getCollector('queries');

            $allQueriesDuration = collect($queries)->sum(function ($query) {
                return $query['duration'];
            });

            $timings = [
                'app.services'    => 0,
                'app.models'      => 0,
                'app.controllers' => 0,
                'app.middleware'  => 0,
                'app.other'       => 0,
                'tests'           => 0,
                'vendor'          => 0
            ];
            $counts = [
                'app.services'    => 0,
                'app.models'      => 0,
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
                        $className = str_replace('.php', '', $source);
                        $reflection = new ReflectionClass($className);
                        if ($reflection->isSubclassOf(\Illuminate\Database\Eloquent\Model::class)) {
                            $key = 'app.models';
                        } else {
                            $key = 'app.other';
                        }
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

                    $kernel = app(Kernel::class);

                    $mw = $kernel->getRouteMiddleware();

                    if (isset($mw[$backtraceZero->name])) {

                        // dd($mw[$backtraceZero->name]);
                    } else {
                    }
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

            $result['queries'] = [
                'allQueriesDuration' => $allQueriesDuration,
                'preparedQueries'    => $preparedQueries,
                'timings'            => $timings,
                'counts'             => $counts,
                'queries'            => $queries,
            ];
        }

        if ($this->collector->enabled('models')) {
            $models = $this->collector->getModels();

            $result['models'] = [
                'count' => $models['count'],
                'data'  => []
            ];

            foreach ($models['data'] as $modelName => $count) {
                $result['models']['data'][] = [
                    'name'  => $modelName,
                    'count' => $count,
                ];
            }
        }

        if ($this->collector->enabled('events')) {
            $events = $this->collector->getEvents();

            $result['events'] = [
                'count'    => count($events['measures']),
                'duration' => $events['duration'],
                'data'     => [],
            ];

            foreach ($events['measures'] as $event) {
                $result['events']['data'][] = [
                    'label'    => $event['label'],
                    'duration' => $event['duration'],
                ];
            }
        }

        if ($this->collector->enabled('cache')) {
            $cache = $this->collector->getCache();

            $result['cache'] = [
                'count'    => count($cache['measures']),
                'duration' => $cache['duration'],
                'data'     => []
            ];

            foreach ($cache['measures'] as $measure) {
                $chunks = explode("\t", $measure['label']);
                $type = array_shift($chunks);

                $result['cache']['data'][] = [
                    'type'     => $type,
                    'label'    => implode("\t", $chunks),
                    'duration' => $measure['duration'],
                ];
            }
        }

        if ($this->collector->enabled('kias')) {
            $kias = $this->collector->getKias();

            $result['kias'] = [
                'count' => count($kias),
                'data'  => collect($kias)->map(function ($row) {
                    if (empty($row['args'])) {
                        $row['args'] = [];
                    }
                    return $row;
                }),
            ];
        }

        if ($this->collector->enabled('auth')) {
            $auth = $this->collector->getAuth();
            $user = auth()->user();

            $result['auth'] = [
                'names' => $auth['names'],
                'user'  => (isset($user) ? $user->id : '')
            ];
        }

        $result['class'] = [
            'filename' => $this->reflection->getFileName()
        ];

        return $result;
    }

    protected function printReport() {
        $name = $this->description ?? static::class;

        $reportData = $this->collectReportData();

        $result = '';

        $result .= sprintf("%s\n\n",
            $this->cli->underlined($this->cli->color($name, CLI::CLI_COLOR_YELLOW))
        );

        if (isset($reportData['routes'])) {
            $routes = $reportData['routes'];

            $result .= sprintf("[%s /%s] as %s\n",
                $this->cli->bold($this->cli->color($routes['methods'], CLI::CLI_COLOR_RED)),
                $this->cli->color($routes['uri'], CLI::CLI_COLOR_LIGHT_YELLOW),
                $this->cli->color($routes['routes']['as'], CLI::CLI_COLOR_LIGHT_YELLOW)
            );

            $result .= sprintf("\tAction %s %s\n",
                $this->cli->color($this->cli->bold($routes['action']), CLI::CLI_COLOR_RED),
                isset($routes['controller']['location']) ? '(' . $routes['controller']['location']['count'] . ' lines)' : '');

            $result .= sprintf("\t\t%s\n\n",
                $this->cli->color($this->cli->bold($this->getFullPath($routes['routes']['file'])), CLI::CLI_COLOR_RED),
            );

            $count = $this->count();
            $plural = Str::pluralStudly('assertion', $count);
            $result .= sprintf("\tPassed %d %s\n\n", $count, $plural);

            $result .= sprintf("\t%s:\t %s\n",
                $this->cli->label("Middlewares"),
                $this->cli->int(count($routes['middleware']))
            );

            $middleware = $routes['middleware'];

            $maxMiddlewareNameLength = $middleware->keys()->max(function ($key) {
                return strlen($key);
            });

            foreach ($routes['middleware'] as $name => $mw) {
                $name = str_pad($name, $maxMiddlewareNameLength);
                $nameColored = $this->cli->color($name, CLI::CLI_COLOR_LIGHT_YELLOW);
                if (empty($mw)) {
                    $result .= sprintf("\t\t%s \n", $nameColored);
                } else {
                    $result .= sprintf("\t\t%s (%s:%s)\n", $nameColored, $mw['file'], $mw['line']);
                }
            }

            $result .= "\n";
        }

        {
            $annotations = $reportData['annotations'];

            if (! empty($annotations['class'])) {
                $class = $annotations['class'];
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

        if (isset($reportData['time'])) {
            $time = $reportData['time'];

            $result .= sprintf("\t%s:\t\t\t%s\n",
                $this->cli->label('Timing'),
                $this->cli->time($time['duration']));

            $maxMeasureNameLength = collect($time['measures'])->max(function ($measure) {
                return strlen($measure['label']['label']);
            });

            foreach ($time['measures'] as $measure) {
                $paddedLabel = str_pad($measure['label']['label'], $maxMeasureNameLength + 1);

                if ($measure['label'] === $this->measureName) {
                    $label = $this->cli->color($paddedLabel, CLI::CLI_COLOR_BLUE);
                } else {
                    $label = $this->cli->label($paddedLabel);
                }

                $result .= sprintf("\t\t%s: %s\n",
                    $label,
                    $this->cli->time($measure['duration'])
                );
            }

            $result .= "\n";
        }

        if (isset($reportData['queries'])) {
            $data = $reportData['queries'];
            $queries2 = $data['queries'];
            $counts = $data['counts'];
            $timings = $data['timings'];
            $preparedQueries = $data['preparedQueries'];
            $allQueriesDuration = $data['allQueriesDuration'];

            $result .= sprintf("\t%s:\t\t  %s %s\n",
                $this->cli->label('SQL queries'),
                $this->cli->color(count($queries2), CLI::CLI_COLOR_RED),
                $this->cli->time($allQueriesDuration)
            );

            $result .= sprintf("\t\ttests           : %s %s\n",
                $this->cli->int($counts['tests']),
                $this->cli->time($timings['tests'])
            );

            $result .= sprintf("\t\tapp.services    : %s %s\n",
                $this->cli->int($counts['app.services']),
                $this->cli->time($timings['app.services'])
            );

            $result .= sprintf("\t\tapp.models      : %s %s\n",
                $this->cli->int($counts['app.models']),
                $this->cli->time($timings['app.models'])
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

            $result .= "\n";

            $maxQueryTypeLength = collect($preparedQueries)
                ->max(function ($query) {
                    return strlen($query['type']);
                }) + 2;

            foreach ($preparedQueries as $index => $query) {

                switch ($query['query']['type']) {
                    case 'query':
                        if ($query['type'] === 'tests') {
                            $type = str_pad('[tests]', $maxQueryTypeLength, ' ', STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_DARK_GRAY);
                        } else if ($query['type'] === 'app.services') {
                            $type = str_pad('[app.services]', $maxQueryTypeLength,' ',  STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.models') {
                            $type = str_pad('[app.models]', $maxQueryTypeLength, ' ', STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_BLUE);
                        } else if ($query['type'] === 'app.controllers') {
                            $type = str_pad('[app.controllers]', $maxQueryTypeLength, ' ', STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.middleware') {
                            $type = str_pad('[app.middleware]', $maxQueryTypeLength,' ',  STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'app.other') {
                            $type = str_pad('[app.other]', $maxQueryTypeLength, ' ', STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_YELLOW);
                        } else if ($query['type'] === 'vendor') {
                            $type = str_pad('[vendor]', $maxQueryTypeLength, ' ', STR_PAD_LEFT);
                            $type = $this->cli->color($type, CLI::CLI_COLOR_DARK_GRAY);
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

                        $duration = $query['query']['duration'];
                        $result .= sprintf("\t\t%s %s %s\n",
                            $type,
                            $this->cli->time($duration),
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
                        $result .= sprintf("\t\t%s\n\n",
                            $this->cli->label($query['query']['sql'])
                        );
                        break;

                    default:
                        dd($query);
                }
            }

            $result .= "\n";
        }

        if (isset($reportData['models'])) {
            $models = $reportData['models'];

            $maxModelNameLength = collect($models['data'])->max(function ($data) {
                return strlen($data['name']);
            });

            $result .= sprintf("\t%s : %s\n",
                $this->cli->label('Models interaction'),
                $this->cli->bold($this->cli->int($models['count']))
            );

            foreach ($models['data'] as $row) {
                $name = str_pad($row['name'], $maxModelNameLength + 3);
                $result .= sprintf("\t\t%s: %s\n",
                    $this->cli->label($name),
                    $this->cli->int($row['count'])
                );
            }

            $result .= "\n";
        }

        if (isset($reportData['events'])) {
            $events = $reportData['events'];

            $result .= sprintf("\t%s:\t%s\t%s\n",
                $this->cli->label('Events'),
                $this->cli->int($events['count']),
                $this->cli->time($events['duration'])
            );

            $maxMeasureNameLength = collect($events['data'])->max(function ($event) {
                return strlen($event['label']);
            });

            foreach ($events['data'] as $event) {
                $paddedLabel = str_pad($event['label'], $maxMeasureNameLength + 1);
                $result .= sprintf("\t\t%s:\t%s\n",
                    $this->cli->label($paddedLabel),
                    $this->cli->time($event['duration'])
                );
            }

            $result .= "\n\n";
        }

        if (isset($reportData['cache'])) {
            $cache = $reportData['cache'];

            $result .= sprintf("\t%s: %s (%s)\n",
                $this->cli->label('Cache'),
                $this->cli->int($cache['count']),
                $this->cli->time($cache['duration'])
            );

            $maxCacheLabelLength = collect($cache['data'])->max(function ($row) {
                return strlen($row['label']);
            });

            $maxCacheTypeLength = collect($cache['data'])->max(function ($row) {
                return strlen($row['type']);
            });

            foreach ($cache['data'] as $measure) {
                $paddedLabel = str_pad($measure['label'], $maxCacheLabelLength + 2);
                $paddedType = str_pad($measure['type'], $maxCacheTypeLength + 2);

                switch ($measure['type']) {
                    case 'missed':
                        $paddedType = $this->cli->color($paddedType, CLI::CLI_COLOR_RED);
                        break;

                    case 'written':
                        $paddedType = $this->cli->color($paddedType, CLI::CLI_COLOR_GREEN);
                        break;

                    case 'hit':
                        $paddedType = $this->cli->color($paddedType, CLI::CLI_COLOR_YELLOW);
                        break;

                    default:
                        dd($measure['type']);
                }

                $result .= sprintf("\t\t%s %s  :  %s\n",
                    $this->cli->label($paddedType),
                    $this->cli->label($paddedLabel),
                    $this->cli->time($measure['duration'])
                );
            }
        }

        if (isset($reportData['kias'])) {
            $kias = $reportData['kias'];

            $result .= sprintf("\n\t%s: %s\n",
                $this->cli->label('Kias'),
                $this->cli->int($kias['count'])
            );

            foreach ($kias['data'] as $row) {
                $result .= sprintf("\t\t%s (%s args)\n",
                    $this->cli->label($row['method']),
                    $this->cli->int(count($row['args']))
                );
            }
        }

        if (isset($reportData['auth'])) {
            $auth = $reportData['auth'];

            $result .= sprintf("\n\t%s:\t%s (#%d)",
                $this->cli->label('Auth'),
                $auth['names'],
                $auth['user']
            ); // TODO Не совсем верно
            $result .= "\n\n";
        }

        $classPath = $reportData['class']['filename'];

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
            // $this->printHTMLReport();
        }

        parent::tearDown();
    }
}
