<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class SandboxCommand extends Command {
    protected $signature = 'sandbox';

    protected $description = 'Command description';

    public function handle() {
        $res = \Cache::remember('test', 10, function () {
            return 'string';
        });
        dd($res);
    }
}
