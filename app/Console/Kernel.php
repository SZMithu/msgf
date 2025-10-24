<?php

namespace App\Console;

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
        'App\Console\Commands\MCAReportFromEmailDocCommand',
        'App\Console\Commands\CreateReportCommand',
        'App\Console\Commands\OldFiledeleteCommand',
        'App\Console\Commands\DeleteOldFileFromAIserverCommand',
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:work --stop-when-empty')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('Create:mcareportfromemaildoc')->withoutOverlapping()->everyFifteenMinutes();
        $schedule->command('Create:report')->withoutOverlapping()->everyFifteenMinutes();
        $schedule->command('oldfile:delete')->dailyAt('02:00');
        $schedule->command('oldfileFromAiServer:delete')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
