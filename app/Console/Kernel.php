<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        try{
            $schedule->command('kias:images')
                ->dailyAt('03:00')
                ->timezone('Asia/Almaty');
            $schedule->command('kias:branches')
                ->dailyAt('03:00')
                ->timezone('Asia/Almaty');
//            $schedule->command('update:fullConstructor')
//                ->dailyAt('03:00')
//                ->timezone('Asia/Almaty');
//            $schedule->command('update:productsDicti')
//                ->dailyAt('03:00')
//                ->timezone('Asia/Almaty');
//            $schedule->command('update:regions')
//                ->weekly();
//            $schedule->command('attributes:dicti')
//                ->weekly();
//            $schedule->command('colorAuto:dicti')
//                ->weekly();
//            $schedule->command('updateDocTypes:dicti')
//                ->weekly();
            $schedule->command('email:send')
                ->weekly();
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
