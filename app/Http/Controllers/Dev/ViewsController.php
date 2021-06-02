<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Artisan;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class ViewsController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class ViewsController extends Controller {
    /**
     * Views
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        $cacheable = false;

        try {
            Artisan::call('view:cache');
            $cacheable = true;
            $noCacheableReason = null;
            Artisan::call('view:clear');
        } catch (\Exception $e) {
            $noCacheableReason = $e->getMessage();
        }

        $views = glob(resource_path('views\**\*.blade.php'));

        $views = collect($views)->map(function (string $file) {
            return [
                'file'         => $file,
                'size'         => filesize($file),
                'size_human'   => $this->humanizeSize(filesize($file)),
                'phpStormLink' => $this->phpStormLink($file)
            ];
        });
        return view('dev.views', compact(
            'views',
            'cacheable',
            'noCacheableReason'
        ));
    }

    /**
     * https://github.com/aik099/PhpStormProtocol
     *
     * @param $path
     * @return string
     */
    private function phpStormLink($path) {
        return sprintf('phpstorm://open?file=%s&line=1', urlencode($path));
    }

    private function humanizeSize(int $filesize, int $precision = 2)
    {
        if ($filesize <= 1024) {
            return round($filesize, $precision) . 'b';
        }
        if ($filesize <= 1024 * 1024) {
            return round($filesize / 1024, $precision) . 'kb';
        }
        if ($filesize <= 1024 * 1024 * 1024) {
            return round($filesize / 1024 / 1024, $precision) . 'mb';
        }
        dd($filesize);
    }
}