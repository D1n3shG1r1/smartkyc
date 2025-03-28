<?php

namespace App\Console\Commands;
use App\Models\Package_model;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DailyTask extends Command
{
    protected $signature = 'mycronjob:run';
    protected $description = 'Update expired packages to inactive';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
        // Get current date
        $currentDate = Carbon::today(); // This will get the current date without time part

        // Find packages where expireon date equals today's date
        $expiredPackages = Package_model::whereDate('expireon', $currentDate)->get();

        // Update the fields for each expired package
        foreach ($expiredPackages as $package) {
            $package->update([
                'active' => 0,
                'expired' => 1,
            ]);
        }

        // Log output (optional for debugging)
        $this->info("Updated " . $expiredPackages->count() . " packages as expired.");
    }
}