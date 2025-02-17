<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailyTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a task daily for checking package expiry';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Place your task logic here
        // For example, sending an email:
        // Mail::to('example@example.com')->send(new DailyEmail());

        $this->info('Daily task executed successfully!');
    }
}
