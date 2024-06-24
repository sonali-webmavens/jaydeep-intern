<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
class SendEmailJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $timeout = 10;
    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function handle()
    {
        $email = new MyTestEmail();
        Mail::to($this->details['email'])->send($email);
    }
}
