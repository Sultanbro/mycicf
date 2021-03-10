<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use DebugBar\DataCollector\DataCollector;
use Illuminate\Console\Command;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\ServiceProvider;

use Eloquent;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class CodeAnalyzeController extends Controller
{
    private function getDirContents($dir, &$results = array())
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
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
    private function processClass(string $name)
    {
        $row = [
            'class' => $name
        ];

        $reflection = new ReflectionClass($name);

        if ($reflection->isSubclassOf(Eloquent::class)) {
            $row['type'] = 'model';
        } elseif ($reflection->isSubclassOf(Controller::class)) {
            $row['type'] = 'controller';
        } elseif ($reflection->isSubclassOf(Command::class)) {
            $row['type'] = 'command';
        } elseif ($reflection->isSubclassOf(Mailable::class)) {
            $row['type'] = 'mail';
        } elseif ($reflection->isSubclassOf(ServiceProvider::class)) {
            $row['type'] = 'service-provider';
        } elseif ($reflection->isSubclassOf(FormRequest::class)) {
            $row['type'] = 'form-request';
        } elseif ($reflection->isSubclassOf(DataCollector::class)) {
            $row['type'] = 'data-collector';
        } elseif (Str::startsWith($name, 'App\Library\Services')) {
            $row['type'] = 'service';
        } elseif (Str::startsWith($name, 'App\Observers')) {
            $row['type'] = 'observer';
        } elseif (Str::startsWith($name, 'App\Http\Middleware')) {
            $row['type'] = 'middleware';
        } elseif (Str::startsWith($name, 'App\Events')) {
            $row['type'] = 'event';
        } elseif (Str::startsWith($name, 'App\Imports')) {
            $row['type'] = 'import';
        } elseif (Str::startsWith($name, 'App\Exports')) {
            $row['type'] = 'export';
        } else {


            $row['type'] = 'other';
        }

        $methods = collect($reflection->getMethods())->filter(function (ReflectionMethod $method) use ($reflection) {
            return $method->getDeclaringClass()->name === $reflection->name;
        })->map(function (ReflectionMethod $method) {
            $startLine = $method->getStartLine();
            $endLine = $method->getEndLine();
            $size = $endLine - $startLine;
            return [
                'name' => $method->getName(),
                'location' => [
                    'start' => $startLine,
                    'end' => $endLine,
                    'size' => $size,
                ]
            ];
        })
            ->sort(function ($a, $b) {
                return $b['location']['size'] - $a['location']['size'];
            })
            ->toArray();

        $row['methods'] = $methods;

        $startLine = $reflection->getStartLine();
        $endLine = $reflection->getEndLine();
        $size = $endLine - $startLine;

        $row['location'] = [
            'start' => $startLine,
            'end' => $endLine,
            'size' => $size,
        ];

        return $row;
    }

    public function index(Request $request)
    {
        if ($_SERVER['SERVER_NAME'] !== '127.0.0.1') {
            return redirect('/');
        }

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

            $row = $this->processClass($name);
            $rows->push($row);

            if ($i >= $limit) {
                break;
            }
        }

        $rows = $rows->sort(function ($a, $b) {
            return $b['location']['size'] - $a['location']['size'];
        });

        $counts = $rows->countBy(function ($row) {
            return $row['type'];
        });

        return view('dev.code', [
            'rows' => $rows,
            'counts' => $counts,
        ]);
    }
}
