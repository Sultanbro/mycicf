<?php

namespace App\Console\Commands;

use App\Comment;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Mail\Email;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Str;
use SebastianBergmann\Comparator\Book;
use function Deployer\isVeryVerbose;

class SandboxCommand extends Command {
    protected $signature = 'sandbox';

    protected $description = 'Command description';

    public function handle() {
        $c = Comment::all();

        $generator = new Faker();



        foreach ($c as $item) {
            dd(Faker::text());
            $item->text = (new \Faker\Generator())->text();
        }
    }
}
