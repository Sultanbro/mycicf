<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Http\Kernel;
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
use Symfony\Component\Finder\Exception\AccessDeniedException;

class CodeAnalyzeController extends Controller {
    /**
     * @var RouteCollection
     */
    private $routes;

    private function collectModelRelationships($modelClass) {

        $model = new $modelClass;

        $relationships = [];

        foreach((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {
            // if ($method->class != get_class($model) ||
            //     !empty($method->getParameters()) ||
            //     $method->getName() == __FUNCTION__) {
            //     continue;
            // }
//
            // try {
            //     $return = $method->invoke($model);
//
            //     if ($return instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
            //         $relationships[$method->getName()] = [
            //             'type' => (new ReflectionClass($return))->getShortName(),
            //             'model' => (new ReflectionClass($return->getRelated()))->getName()
            //         ];
            //     }
            // } catch(\Throwable $e) {}
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
            'phpstormLink' => $this->phpStormLink($fileName, $class->getStartLine()),
        ];

        if ($class->isSubclassOf(Eloquent::class)) {
            $row['type'] = 'Models';
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
        } elseif ($class->isSubclassOf(\SimpleXMLElement::class)) {
            $row['type'] = 'XML';
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

                if (!empty($key)) {
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

                    if (!empty($route)) {
                        $action['found'] = true;
                        $action['methods'] = implode('|', $route->methods());
                        $action['uri'] = $route->uri;
                    }

                } else {
                    $actionFound = null;
                }

                return [
                    'name'         => $method->getName(),
                    'doc'          => $method->getDocComment(),
                    'numParams'    => $method->getNumberOfParameters(),
                    'access'       => $access,
                    'action'       => $action,
                    'phpstormLink' => $this->phpStormLink($fileName, $startLine),
                    'location'     => [
                        'start' => $startLine,
                        'end'   => $endLine,
                        'size'  => $size,
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
            return !empty($method['action']['found']);
        })->count();
        $row['documentedMethodsCount'] = collect($methods)->filter(function ($method) {
            return (bool)$method['doc'];
        })->count();


        $startLine = $class->getStartLine();
        $endLine = $class->getEndLine();
        $size = $endLine - $startLine;

        $row['location'] = [
            'start' => $startLine,
            'end'   => $endLine,
            'size'  => $size,
        ];

        return $row;
    }

    private function phpStormLink($file, $line) {
        return sprintf('phpstorm://open?file=%s&line=%d', urlencode($file), $line);
    }

    public function index(Request $request) {
        if (! \App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $this->routes = \Route::getRoutes();
        $a = $this->getDirContents(app_path());
        $rows = collect();
        $limit = 10;
        $i = 0;

        foreach ($a as $entry) {
            $entry = str_replace(app_path(), '', $entry);
            $entry = preg_replace('%\\.php$%', '', $entry);
            $name = 'App' . $entry;

            if (is_dir(base_path($name))) {
                continue;
            }

            $row = \Debugbar::measure(sprintf("Processing class %s", $name), function () use ($name) {
                return $this->processClass($name);
            });

            $rows->push($row);

            if ($i >= $limit) {
                break;
            }
        }

        $rows = $rows->sort(function ($a, $b) {
            return $b['location']['size'] - $a['location']['size'];
        });

        $counts = $rows
            ->countBy(function ($row) {
                return $row['type'];
            })
            ->sort()
            ->reverse();

        $rows = $rows->groupBy('type');

        return view('dev.code', compact('rows', 'counts'));
    }

    public function tests() {
        if (! \App::isLocal()) {
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

    public function routes() {
        $routes = \Route::getRoutes()->getRoutes();

        return view('dev.routes', compact('routes'));
    }
}
