<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Traits\RegistersPasswords;

class PasswordController extends Controller
{
    use RegistersPasswords;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

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
     * Update user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(array $data, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($data['new_password']);
        $user->save();

        return $user;
    }
}