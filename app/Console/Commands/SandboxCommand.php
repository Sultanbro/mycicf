<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use App\Mail\Email;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use SebastianBergmann\Comparator\Book;
use function Deployer\isVeryVerbose;

class SandboxCommand extends Command {
    protected $signature = 'sandbox';

    protected $description = 'Command description';

    public function handle() {

    }
}
