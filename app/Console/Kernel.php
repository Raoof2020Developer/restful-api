<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('php artisan passport:purge')->hourly();
        // $schedule->call(function() {
        //     DB::table('recent_users')->delete();
        // })->daily();
        // $schedule->exec('sudo /etc/init.d/apache2 stop')->daily();
        // $schedule->exec('sudo /opt/lampp/lampp start')->daily();
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
