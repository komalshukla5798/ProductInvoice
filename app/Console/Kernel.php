<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->command('command:name')->hourly();
        $schedule->call(function(){
            User::where('id',8)->delete();
        })->hourly();
        $schedule->job(new Heartbeat)->everyFiveMinutes();
        $schedule->exec('node /home/forge/script.js')->daily();
        $schedule->command('emails:send')->evenInMaintenanceMode();
        $schedule->job(new DeleteRecentUsers)->everyTenSeconds();
        $schedule->command('users:delete')->everyTenSeconds()->runInBackground();
        $schedule->command('emails:send')
            ->daily()
            ->environments(['staging', 'production']);
            $schedule->command('emails:send')->withoutOverlapping(); // If scheduled tasks will be run even if previous Instance of task is still running then 
            $schedule->command('analytics:report')
         ->daily()
         ->runInBackground();




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
