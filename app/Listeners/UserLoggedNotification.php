<?php

namespace App\Listeners;

use App\Events\UserLogged;

class UserLoggedNotification
{
    /**
     * Handle the event.
     *
     * @param  UserLogged  $event
     * @return void
     */
    public function handle(UserLogged $event)
    {
        $user = $event->user;
        $user->loggeds()->create();
    }
}