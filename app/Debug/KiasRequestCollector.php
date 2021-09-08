<?php

namespace App\Debug;

use DebugBar\DataCollector\DataCollector;

class KiasRequestCollector extends DataCollector {
    private $data = [];

    public function collect() {
        return $this->data;
    }

    public function getName() {
        return 'kias';
    }

    public function push($data) {
        $this->data[] = $data;
    }
}
