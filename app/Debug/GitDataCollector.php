<?php

namespace App\Debug;

use DebugBar\DataCollector\DataCollector;
use Illuminate\Support\Str;

class GitDataCollector extends DataCollector {
    public function collect() {
        return [
            'branch' => $this->getBranch(),
        ];
    }

    public function getName() {
        return 'git';
    }

    private function getBranch() {
        exec('git branch', $output);

        return collect($output)->first(function ($line) {
            return Str::startsWith($line, '*');
        });
    }
}
