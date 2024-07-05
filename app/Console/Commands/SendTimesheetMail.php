<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmployeeDetail;
use App\Notifications\TimesheetNotification;
use Carbon\Carbon;
use Notification;

class SendTimesheetMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:timesheet-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send timesheet mail to admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now('CST')->toDateString();
        $employeeDetails = EmployeeDetail::where('working_date', '<', $now)->get();

        if ($employeeDetails->isNotEmpty()) {
            Notification::route('mail', 'admin@admin.com')->notify(new TimesheetNotification($employeeDetails));
            $this->info('Timesheet mail sent to admin.');
        } else {
            $this->info('No timesheets to send.');
        }
    
        return Command::SUCCESS;
    }
}
