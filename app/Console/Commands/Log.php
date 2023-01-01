<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Log extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:logged';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Logged users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $database = "laravel";
        $current_timestamp = Carbon::now()->toDateTimeString();
        $sql = "insert into {$database}.logs (name, logged_time) select name,'{$current_timestamp}' as logged_time from {$database}.users";
        // echo $sql;
        DB::statement($sql);
    }
}
