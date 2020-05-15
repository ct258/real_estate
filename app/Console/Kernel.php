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
        // 'App\Console\Commands\Backup',
        Commands\DemoCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //backup dữ liệu vào 7h sáng thứ 2 mỗi tuần
        // $schedule->command('backupcommand')->everyMinute();
        // $schedule->command('demo:cron')
        // ->everyMinute();
        $schedule->command('backup:run')->timezone('Asia/Ho_Chi_Minh')->daily()->at('01:00');
        // $schedule->command('backup:run')->weekly()->mondays()->at('07:00');
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
