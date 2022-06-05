<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class TestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $mail_info;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_info)
    {
        $this->mail_info= $mail_info;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailInfo = [
            'title' => 'Welcome New User',
            'url' => 'https://www.remotestack.io'
        ];
        $email = new TestMail($mailInfo);

        Mail::to($this->mail_info)->send($email);


    }
}
