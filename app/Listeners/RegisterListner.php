<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\RegistrationMailSend;
use Mail;

class RegisterListner
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(RegistrationMailSend $event)
    {
        $user = $event->user;

         Mail::send('auth.emails.registerConfirmation', ['user' => $user, 'content' => ''], function ($message) use ($user)
            {

                $message->to($user->email);

            }); 
    }
}
