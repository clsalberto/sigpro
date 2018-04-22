<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserUnlogged
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}