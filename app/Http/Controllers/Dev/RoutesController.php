<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Artisan;
use ReflectionClass;
use Route;

/**
 * Class RoutesController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class RoutesController extends Controller {
    /**
     * Routes
     *
     * @return \Illuminate\View\View
     * @throws \ReflectionException
     */
    public function index() {
        $routes = Route::getRoutes()->getRoutes();

        $routes = collect($routes)->sortBy(function ($route) {
            return $route->getName();
        });

        $stats = [
            'routes-with-no-name' => 0,
            'dead-routes'         => 0,
        ];

        foreach ($routes as $route) {
            if (empty($route->getName())) {
                $stats['routes-with-no-name']++;
            }

            if ($this->isDeadRoute($route)) {
                $stats['dead-routes']++;
            }
        }

        $cacheable = false;
        try {
            Artisan::call('route:cache');
            $cacheable = true;
            $noCacheableReason = null;
            Artisan::call('route:clear');
        } catch (\Exception $e) {
            $noCacheableReason = $e->getMessage();
        }

        $routesByDomain = collect($routes)
            ->countBy(function (\Illuminate\Routing\Route $route) {
                return $route->getDomain();
            })
            ->sortKeys();

        $routesByGroup = collect($routes)
            ->countBy(function (\Illuminate\Routing\Route $route) {
                $name = $route->getName();
                if (empty($name)) {
                    return '';
                }

                [$group] = explode('.', $name);

                return $group;
            })
            ->sortByDesc(function ($count) {
                return $count;
            });

        $links = [];

        foreach ($routes as $route) {
            $uses = $route->getAction()['uses'];

            if ($uses instanceof \Closure) {
                continue;
            }
            $links[$uses] = $this->phpStormLink($uses);
        }

        $cachedRoutePath = app()->getCachedRoutesPath();

        return view('dev.routes', compact(
            'routes',
            'stats',
            'routesByDomain',
            'cacheable',
            'noCacheableReason',
            'routesByGroup',
            'cachedRoutePath',
            'links'
        ));
    }

    /**
     * https://github.com/aik099/PhpStormProtocol
     *
     * @param $action
     * @return string
     * @throws \ReflectionException
     */
    private function phpStormLink($action) {
        [$class, $method] = explode('@', $action);

        try {
            $reflection = new ReflectionClass($class);

            if (! $reflection->hasMethod($method)) {
                return null;
            }

            $methodReflection = $reflection->getMethod($method);

            return sprintf('phpstorm://open?file=%s&line=%d', urlencode($reflection->getFileName()), $methodReflection->getStartLine());

        } catch (\ReflectionException $e) {
            return null;
        }
    }

    private function isDeadRoute(\Illuminate\Routing\Route $route) {
        $action = $route->getAction()['uses'];

        if ($action instanceof \Closure) {
            return false;
        }

        [$class, $method] = explode('@', $action);
        try {
            $reflection = new ReflectionClass($class);

            if (! $reflection->hasMethod($method)) {
                return null;
            }

            $method = $reflection->getMethod($method);

            if (empty($method)) {
                return true;
            }

            return false;
        } catch (\ReflectionException $e) {
            return true;
        }
    }
}
