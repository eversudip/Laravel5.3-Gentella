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
        $confirmationUrl = $this->generateConfirmationUrl($user);

         Mail::send('auth.emails.registerConfirmation', ['user' => $user, 'url' => $confirmationUrl ], function ($message) use ($user)
            {

                $message->to($user->email)->subject('Please verify the email');

            }); 
    }

    /**
     * Generate the confirmation url for the user activation
     * @param  \App\Models\User  $user
     * @return string $url
     */
    protected function generateConfirmationUrl($user)
    {
        $url = url('/').'/register/confirm/'.$user->confirmation_code;
        return $url;
    }
}
