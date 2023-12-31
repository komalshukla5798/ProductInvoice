<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = new SendEmailTest();
        // Mail::to($this->details['email'])->send($email);
        // $details['email'] = 'komalshukla@gmail.com';
        // $details['name'] = 'komal';
        // $data = $this->details;
        Mail::to('komalshukla@gmail.com')->send(new App\Mail\SendTestMail());
    }
}
