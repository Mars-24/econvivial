<?php

namespace App\Console;

use App\Console\Commands\UpdateCodeUser;
use App\Console\Commands\SmsCron;
use App\Console\Commands\JobCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\JobCommand',
        'App\Console\Commands\SmsCron',
        UpdateCodeUser::class,
    ];
    

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('JobCommand:notification')->everyMinute();
            
         $schedule->command('notify:sms')->dailyAt('13:00');
         //$schedule->command('notify:sms')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
