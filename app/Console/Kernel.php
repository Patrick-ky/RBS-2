<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\SendDueDateReminders;
use App\Models\ClientInfo;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:due-date-reminders-now')->dailyAt('08:00');
        $schedule->call(function () {
            $today = now()->startOfDay();
            $records = ClientInfo::whereDate('due_date', '=', $today->addDays(15)->toDateString())->get();
            foreach ($records as $record) {
                // Send reminders
            }
        })->monthlyOn(22, '08:00'); // Send reminders on the 22nd day of each month at 8:00 AM

        // Your other scheduled tasks here
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

