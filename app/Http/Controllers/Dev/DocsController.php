<?php

namespace App\Http\Controllers\Dev;

use App;
use App\Http\Controllers\Controller;
use Artisan;
use Symfony\Component\Finder\Exception\AccessDeniedException;

/**
 * Class DocsController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class DocsController extends Controller {
    /**
     * Docs
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        if (! App::isLocal()) {
            throw new AccessDeniedException('Access denied');
        }

        return view('apidoc.index');
    }
}
