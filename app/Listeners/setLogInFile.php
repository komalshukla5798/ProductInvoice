<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTestMail;

class setLogInFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        // dd($event);

        // //We can send a mail from here
        // echo ".. From Listeners";
        // exit;
        Mail::to($event)->send(new SendTestMail());
    }
}
