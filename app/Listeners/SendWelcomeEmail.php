<?php

namespace App\Listeners;

use App\Events\EmailVerified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;
use App\Mail\WelcomeToArtist;

class SendWelcomeEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmailVerified  $event
     * @return void
     */
    public function handle(EmailVerified $event)
    {
        Mail::to($event->user->email)
            ->send(new WelcomeToArtist($event->user));
    }
}
