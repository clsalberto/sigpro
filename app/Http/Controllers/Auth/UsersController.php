<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\RegistersUsers;
use App\User;

class UsersController extends Controller
{
    use Registersusers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => proper_case($data['name']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['type'],
        ]);

        $user->profile()->create();

        return $user;
    }
}
