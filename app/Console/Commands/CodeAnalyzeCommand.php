<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use Eloquent;
use Illuminate\Console\Command;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class CodeAnalyzeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:analyze';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * Execute the console command.
     *
     * @return void
     * @throws ReflectionException
     */
    public function handle()
    {
        $a = $this->getDirContents(app_path());

        $rows = collect();

        $limit = 10;

        $i = 0;

        foreach ($a as $entry) {
            $row = [];
            $entry = str_replace(app_path(), '', $entry);
            $entry = preg_replace('%\\.php$%', '', $entry);

            $name = 'App' . $entry;
            if (is_dir(base_path($name))) {
                continue;
            } else {
                $row['class'] = $name;

                $reflection = new ReflectionClass($name);

                if ($reflection->isSubclassOf(Eloquent::class)) {
                    $row['type'] = 'model';
                } elseif ($reflection->isSubclassOf(Controller::class)) {
                    $row['type'] = 'controller';
                } elseif ($reflection->isSubclassOf(Command::class)) {
                    $row['type'] = 'command';
                } else {

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

                if ($i >= $limit) {
                    break;
                }
            }

            //

            $rows->push($row);
        }

        $rows = $rows->sort(function ($a, $b) {
            return $b['location']['size'] - $a['location']['size'];
        });

        dd($rows[1]);
    }
}
