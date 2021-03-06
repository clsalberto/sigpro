<?php

namespace App\Listeners;

use App\Events\UserUnlogged;

class UserUnloggedNotification
{
    public function handle(UserUnlogged $event)
    {
        $user = $event->user->loggeds->where('logged', true)->first();
        if ($user) {
            $user->logged = false;
            $user->save();
        }
    }
}