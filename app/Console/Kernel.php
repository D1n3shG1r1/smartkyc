<?php

namespace App\Console;
use App\Console\Commands\DailyTask;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        DailyTask::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //everyMinute()
        //hourly()
        //daily()
        //weekly()
        //cron('* * * * *') (custom cron syntax)
        
        //Finally, you need to tell the system cron to run Laravel's scheduler every minute.
        //Open your crontab by running:
        //crontab -e
        //* * * * * php /path_to_your_project/artisan schedule:run >> /dev/null 2>&1
        
        
        // The notation * * * * * is a standard cron expression used in Unix-like systems to define when a cron job should run. It represents a schedule for running the task. Each asterisk corresponds to a different time unit (minute, hour, day of the month, month, and day of the week).

        //Here’s what each field represents:

        // First * (Minute): This represents the minute of the hour when the cron job will run. A * means "every minute."
        // Second * (Hour): This represents the hour of the day when the cron job will run. A * means "every hour."
        // Third * (Day of the month): This represents the day of the month when the cron job will run. A * means "every day."
        // Fourth * (Month): This represents the month when the cron job will run. A * means "every month."
        // Fifth * (Day of the week): This represents the day of the week when the cron job will run. A * means "every day of the week."
        // Example:
        // * * * * * means "Run every minute of every hour of every day of every month, no matter the day of the week."
        // Specific Examples:
        // 0 0 * * *: Runs every day at midnight (00:00).
        // */5 * * * *: Runs every 5 minutes.
        // 0 9 * * 1: Runs every Monday at 9 AM.
        // 0 12 1 * *: Runs at noon on the 1st day of every month.
        // This cron expression allows you to specify how frequently a task is executed based on the time intervals you define.

             
        // Define when the cron job will run here
        $schedule->command('mycronjob:run')->hourly(); // Example: run every minute
    }   

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}