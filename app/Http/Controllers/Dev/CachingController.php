<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Artisan;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class CachingController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class CachingController extends Controller {
    /**
     * Views
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        return view('dev.caching', [
            'config' => $this->isConfigCacheable(),
            'routes' => $this->areRoutesCacheable(),
            'views' => $this->areViewsCacheable(),
            'events' => $this->areEventsCacheable(),
        ]);
    }

    private function isConfigCacheable() {
        try {
            Artisan::call('config:cache');
            $cacheable = true;
            $reason = null;
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            $cacheable = false;
            $reason = $e->getMessage();
        }

        return compact('cacheable', 'reason');
    }

    private function areRoutesCacheable() {

        $cacheable = false;
        try {
            Artisan::call('route:cache');
            $cacheable = true;
            $reason = null;
            Artisan::call('route:clear');
        } catch (\Exception $e) {
            $reason = $e->getMessage();
        }

        return compact('cacheable', 'reason');
    }

    private function areViewsCacheable() {
        try {
            Artisan::call('view:cache');
            $cacheable = true;
            $reason = null;
            Artisan::call('view:clear');
        } catch (\Exception $e) {
            $reason = $e->getMessage();
        }

        return compact('cacheable', 'reason');
    }

    private function areEventsCacheable() {
        try {
            Artisan::call('event:cache');
            $cacheable = true;
            $reason = null;
            Artisan::call('event:clear');
        } catch (\Exception $e) {
            $reason = $e->getMessage();
        }

        return compact('cacheable', 'reason');
    }
}
