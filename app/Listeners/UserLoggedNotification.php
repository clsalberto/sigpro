<?php

namespace App\Listeners;

use App\Events\UserLogged;

class UserLoggedNotification
{
    public function handle(UserLogged $event)
    {
        $user = $event->user;
        $user->loggeds()->create();
    }
}