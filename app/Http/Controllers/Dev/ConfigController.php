<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Artisan;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class ConfigController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 */
class ConfigController extends Controller {
    public function index() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $cacheable = false;

        $all = config()->all();
        $this->plainConfig($all, $result);

        try {
            Artisan::call('config:cache');
            $cacheable = true;
            $noCacheableReason = null;
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            $cacheable = false;
            $noCacheableReason = $e->getMessage();
        }

        return view('dev.config', compact(
            'cacheable',
            'noCacheableReason',
            'result'
        ));
    }

    private function plainConfig($cfg, &$result, $prefix = '') {
        foreach ($cfg as $key => $value) {
            if (is_array($value)) {
                $this->plainConfig($value, $result, $prefix . '.' . $key);
            } else {
                $configKey = ltrim($prefix . '.' . $key, '.');
                $result[$configKey] = $value;
            }
        }
    }
}
