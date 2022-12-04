<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Laurent\Laurent;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function() {
        //     Log:info("Работает!");
        //     Laurent::outTimer('http://192.168.0.101', 'out', 9);
        // })->everyMinute();
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
