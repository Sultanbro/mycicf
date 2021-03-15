<?php

namespace App\Debug;

use DebugBar\DataCollector\DataCollector;

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
        exec('git branch --show-current', $output);

        [$branch] = $output;

        return $branch;
    }
}
