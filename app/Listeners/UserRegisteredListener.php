<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Notifications\RegistrationNotification;

class UserRegisteredListener
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        
        //notify the user of their registration.
        $user->notify(new RegistrationNotification());
    }
}
