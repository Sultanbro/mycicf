<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Route;

/**
 * Class RoutesController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 */
class RoutesController extends Controller {
    public function index() {
        $routes = Route::getRoutes()->getRoutes();

        $stats = [
            'routes-with-no-name' => 0,
        ];

        foreach ($routes as $route) {
            if (empty($route->getName())) {
                $stats['routes-with-no-name']++;
            }
        }

        $cacheable = false;
        try {
            \Artisan::call('route:cache');
            $cacheable = true;

        } catch (\Exception $e) {
            $noCacheableReason = $e->getMessage();
        }

        $routesByDomain = collect($routes)->countBy(function (\Illuminate\Routing\Route $route) {
            return $route->getDomain();
        });

        return view('dev.routes', compact(
            'routes',
            'stats',
            'routesByDomain',
            'cacheable',
            'noCacheableReason'
        ));
    }
}
