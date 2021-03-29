<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use App\Mail\Email;
use App\Post;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use SebastianBergmann\Comparator\Book;
use function Deployer\isVeryVerbose;

class SandboxCommand extends Command {
    protected $signature = 'sandbox';

    protected $description = 'Command description';

    public function handle() {
        dd(Post::select([\DB::raw('MIN(created_at) as start'), \DB::raw('MAX(created_at) as end')])->first()->toJson());
    }
}
