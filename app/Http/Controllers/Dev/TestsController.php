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
 *
 * Class TestsController
 * @package App\Http\Controllers\Dev
 *
 * @codeCoverageIgnore
 * @group Dev
 */
class TestsController extends Controller {
    public function index() {
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
