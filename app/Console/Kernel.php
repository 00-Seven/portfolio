<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
        //     $database = "laravel";
        //     $current_timestamp = Carbon::now()->toDateTimeString();
        //     $sql = "insert into {$database}.logs (name, logged_time) select name,'{$current_timestamp}' as logged_time from {$database}.users";
        //     // echo $sql;
        //     DB::statement($sql);

        //  })->dailyAt("23:41");
        $schedule->command('users:logged')->dailyAt("23:53");
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
