<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use App\Http\Kernel;
use Debugbar;
use Illuminate\Database\Eloquent\Relations\Relation;
use Route;
use DebugBar\DataCollector\DataCollector;
use Illuminate\Console\Command;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\ServiceProvider;
use Eloquent;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use SimpleXMLElement;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * https://github.com/aik099/PhpStormProtocol
 *
 * Class CodeAnalyzeController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 */
class CodeAnalyzeController extends Controller {
    public const CLASS_MAX_LINES = 100;
    public const METHOD_MAX_LINES = 30;

    /**
     * @var RouteCollection
     */
    private $routes;

    private function collectModelRelationships($row) {
        $modelClass = $row['class'];
        $model = new $modelClass;

        $relationships = [];
        $methods = (new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if ($method->class !== get_class($model) ||
                ! empty($method->getParameters()) ||
                $method->getName() === __FUNCTION__) {
                continue;
            }

            try {
                $result = $method->invoke($model);

                if ($result instanceof Relation) {
                    $relationships[$method->getName()] = [
                        'type'  => (new ReflectionClass($result))->getShortName(),
                        'model' => (new ReflectionClass($result->getRelated()))->getName()
                    ];
                }
            } catch (\Throwable $e) {
            }
        }

        return $relationships;
    }

    private function getDirContents($dir, &$results = array()) {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (! is_dir($path)) {
                $results[] = $path;
            } else if ($value !== "." && $value !== "..") {
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }

    /**
     * @param string $name
     * @return string[]
     * @throws ReflectionException
     */
    private function processClass(string $name) {
        $class = new ReflectionClass($name);
        $fileName = $class->getFileName();

        $row = [
            'class'        => $name,
            'parent'       => $class->getParentClass() ? $class->getParentClass()->getShortName() : null,
            'file'         => $fileName,
            'traitNames'   => $class->getTraitNames(),
            'phpstormLink' => $this->phpStormLink($class),
        ];

        if ($class->isSubclassOf(Eloquent::class)) {
            $row['type'] = 'Models';
            $row['relations'] = Debugbar::measure('Processing relations for ' . $row['class'], function () use ($row) {
                $md5 = md5_file($row['file']);
                $key = 'Model::relations::' . $row['class'] . '::' . $md5;
                return cache()->remember($key, 10, function () use ($row) {
                    return $this->collectModelRelationships($row);
                });
            });

        } elseif ($class->isSubclassOf(Controller::class)) {
            $row['type'] = 'Controllers';
        } elseif ($class->isSubclassOf(Command::class)) {
            $row['type'] = 'Commands';
        } elseif ($class->isSubclassOf(Mailable::class)) {
            $row['type'] = 'Mail';
        } elseif ($class->isSubclassOf(ServiceProvider::class)) {
            $row['type'] = 'Service Providers';
        } elseif ($class->isSubclassOf(FormRequest::class)) {
            $row['type'] = 'Form Requests';
        } elseif ($class->isSubclassOf(DataCollector::class)) {
            $row['type'] = 'Data Collectors';
        } elseif ($class->isSubclassOf(SimpleXMLElement::class)) {
            $row['type'] = 'XML';
        } elseif (Str::startsWith($name, 'App\Library\Services\Mocks')) {
            $row['type'] = 'Service Mocks';
        } elseif (Str::startsWith($name, 'App\Library\Services')) {
            $row['type'] = 'Services';
        } elseif (Str::startsWith($name, 'App\Observers')) {
            $row['type'] = 'Observers';
        } elseif (Str::startsWith($name, 'App\Http\Middleware')) {
            $row['type'] = 'Middlewares';
        } elseif (Str::startsWith($name, 'App\Events')) {
            $row['type'] = 'Events';
        } elseif (Str::startsWith($name, 'App\Imports')) {
            $row['type'] = 'Imports';
        } elseif (Str::startsWith($name, 'App\Exports')) {
            $row['type'] = 'Exports';
        } elseif (Str::startsWith($name, 'App\Helpers')) {
            $row['type'] = 'Helpers';
        } else {
            $row['type'] = 'Others';
        }

        switch ($row['type']) {
            case 'Controllers':
                $row['shortName'] = str_replace('App\\Http\\Controllers\\', '', $row['class']);
                break;

            case 'Commands':
                $row['shortName'] = str_replace('App\\Console\\Commands\\', '', $row['class']);
                break;

            case 'Events':
                $row['shortName'] = str_replace('App\\Events\\', '', $row['class']);
                break;

            case 'Exports':
                $row['shortName'] = str_replace('App\\Exports\\', '', $row['class']);
                break;

            case 'Imports':
                $row['shortName'] = str_replace('App\\Imports\\', '', $row['class']);
                break;

            case 'Services':
                $row['shortName'] = str_replace('App\\Library\\Services\\', '', $row['class']);
                break;

            case 'Service Mocks':
                $row['shortName'] = str_replace('App\\Library\\Services\\Mocks\\', '', $row['class']);
                break;

            case 'Middlewares':
                $row['shortName'] = str_replace('App\Http\Middleware\\', '', $row['class']);

                $kernel = app(Kernel::class);
                $routeMiddleware = $kernel->getRouteMiddleware();

                $key = null;
                $foundClass = null;

                foreach ($routeMiddleware as $k => $className) {
                    if ($row['class'] === $className) {
                        $key = $k;
                        $foundClass = $className;
                        break;
                    }
                }

                if (! empty($key)) {
                    $row['middlewareKey'] = $key;
                }

                break;

            case 'Form Requests':
                $row['shortName'] = str_replace('App\Http\Requests\\', '', $row['class']);
                break;

            case 'Models':
                // $rel = $this->collectModelRelationships($row['class']);

                // dump($row['class'], $rel);
                $row['shortName'] = str_replace('App\\', '', $row['class']);
                $row['shortName'] = str_replace('App\\Models\\', '', $row['shortName']);
                break;

            case 'Mail':
                $row['shortName'] = str_replace('App\\Mail\\', '', $row['class']);
                break;

            case 'Observers':
                $row['shortName'] = str_replace('App\\Observers\\', '', $row['class']);
                break;

            case 'Service Providers':
                $row['shortName'] = str_replace('App\\Providers\\', '', $row['class']);
                break;

            case 'XML':
                $row['shortName'] = str_replace('App\\XML\\', '', $row['class']);
                break;

            case 'Helpers':
                $row['shortName'] = str_replace('App\\Helpers\\', '', $row['class']);
                break;

            case 'Others':
            case 'Data Collectors':
                $row['shortName'] = $row['class'];
                break;
            default:
                dd($row['type'], $row['class']);
        }

        $methods = collect($class->getMethods())
            ->filter(function (ReflectionMethod $method) use ($class, $fileName) {
                return $method->getDeclaringClass()->name === $class->name;
            })
            ->map(function (ReflectionMethod $method) use ($fileName, $row) {
                $startLine = $method->getStartLine();
                $endLine = $method->getEndLine();
                $size = $endLine - $startLine;

                $access = [];

                if ($method->isPrivate()) {
                    $access[] = 'private';
                }

                if ($method->isProtected()) {
                    $access[] = 'protected';
                }

                if ($method->isPublic()) {
                    $access[] = 'public';
                }

                if ($method->isAbstract()) {
                    $access[] = 'abstract';
                }

                if ($method->isStatic()) {
                    $access[] = 'static';
                }

                if ($method->isFinal()) {
                    $access[] = 'final';
                }

                $action = [
                    'found' => false,
                ];

                if ($row['type'] === 'Controllers') {
                    $route = $this->routes->getByAction("{$method->class}@{$method->name}");

                    if (! empty($route)) {
                        $action['found'] = true;
                        $action['methods'] = implode(' ', $route->methods());
                        $action['uri'] = $route->uri;
                    }
                } else {
                    $actionFound = null;
                }

                $docComment = $method->getDocComment();

                if (! empty($docComment)) {
                    $docComment = collect(preg_split('%[\r\n]+%', $docComment))->map(function ($line) {
                        return trim($line);
                    })->map(function ($line, $index) {
                        if ($index === 0) {
                            return $line;
                        }
                        return ' ' . $line;
                    })->join("\n");
                }

                return [
                    'name'         => $method->getName(),
                    'doc'          => $docComment,
                    'numParams'    => $method->getNumberOfParameters(),
                    'access'       => $access,
                    'action'       => $action,
                    'phpstormLink' => $this->phpStormLink($method),
                    'location'     => [
                        'start'      => $startLine,
                        'end'        => $endLine,
                        'size'       => $size,
                        'isTooLarge' => $size > self::METHOD_MAX_LINES,
                    ]
                ];
            })
            ->sort(function ($a, $b) {
                return $b['location']['size'] - $a['location']['size'];
            })
            ->toArray();

        $row['methods'] = $methods;
        $row['methodsCount'] = collect($methods)->count();
        $row['actionsCount'] = collect($methods)->filter(function ($method) {
            return ! empty($method['action']['found']);
        })->count();
        $row['documentedMethodsCount'] = collect($methods)->filter(function ($method) {
            return (bool)$method['doc'];
        })->count();

        $startLine = $class->getStartLine();
        $endLine = $class->getEndLine();
        $size = $endLine - $startLine;
        $isTooLarge = $size > self::CLASS_MAX_LINES;

        $row['location'] = [
            'start'      => $startLine,
            'end'        => $endLine,
            'size'       => $size,
            'isTooLarge' => $isTooLarge
        ];

        return $row;
    }

    /**
     * https://github.com/aik099/PhpStormProtocol
     *
     * @param $entity
     * @return string
     */
    private function phpStormLink($entity) {
        if ($entity instanceof ReflectionClass || $entity instanceof ReflectionMethod) {
            return sprintf('phpstorm://open?file=%s&line=%d', urlencode($entity->getFileName()), $entity->getStartLine());
        }

        dd($entity);
    }

    public function index(Request $request) {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $this->routes = Route::getRoutes();
        $contents = $this->getDirContents(app_path());
        $rows = collect();

        Debugbar::startMeasure('Process all classes');
        foreach ($contents as $entry) {
            $entry = str_replace(app_path(), '', $entry);
            $entry = preg_replace('%\\.php$%', '', $entry);
            $name = 'App' . $entry;

            if (is_dir(base_path($name))) {
                continue;
            }

            $row = Debugbar::measure(sprintf("Processing class %s", $name), function () use ($name) {
                return $this->processClass($name);
            });

            $rows->push($row);
        }
        Debugbar::stopMeasure('Process all classes');

        $rows = $rows->sort(function ($a, $b) {
            return $b['location']['size'] - $a['location']['size'];
        });

        $counts = $rows
            ->countBy(function ($row) {
                return $row['type'];
            })
            ->sort()
            ->reverse();

        $classesCount = $rows->count();
        $methodsCount = $rows->sum(function ($class) {
            return $class['methodsCount'];
        });

        $tooLargeClassesCount = $rows->filter(function ($class) {
            return $class['location']['isTooLarge'];
        })->count();

        $tooLargeMethodsCount = $rows->sum(function ($class) {
            return collect($class['methods'])->filter(function ($method) {
                return $method['location']['isTooLarge'];
            })->count();
        });

        $rows = $rows->groupBy('type');

        return view('dev.code', compact(
            'rows',
            'counts',
            'classesCount',
            'methodsCount',
            'tooLargeClassesCount',
            'tooLargeMethodsCount'));
    }

    public function tests() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $filePath = base_path('tests/Feature/report.json');

        if (! file_exists($filePath)) {
            return;
        }

        $data = json_decode(file_get_contents($filePath), true);

        return view('dev.tests', [
            'data' => $data,
        ]);
    }
}
