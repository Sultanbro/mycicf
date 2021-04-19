<?php

namespace App\Console\Commands;

use App\Booking;
use App\Http\Controllers\Controller;
use Eloquent;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\ServiceProvider;
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

    /**
     * Execute the console command.
     *
     * @return void
     * @throws ReflectionException
     */
    public function handle(\AddPostRequest $request)
    {
        try {
            // ...
        } catch (\Exception $e) {

        } catch (\HttpException $e) {

        } finally {

        }
    }
}
