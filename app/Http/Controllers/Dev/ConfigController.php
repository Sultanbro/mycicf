<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Artisan;

/**
 * Class ConfigController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 */
class ConfigController extends Controller {
    public function index() {
        $cacheable = false;

        try {
            Artisan::call('config:cache');
            $cacheable = true;
            $noCacheableReason = null;
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            $noCacheableReason = $e->getMessage();
        }

        return view('dev.config', compact(
            'cacheable',
            'noCacheableReason'
        ));
    }
}
