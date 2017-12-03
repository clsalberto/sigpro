<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Traits\RegistersProfiles;

class ProfileController extends Controller
{
    use RegistersProfiles;

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
        $user->name = $data['name'];
        $user->avatar = $this->avatar($data['avatar'], 128);
        $user->save();

        $user->profile()->update([
            'surname' => $data['surname'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'about_me' => $data['about_me']
        ]);

        return $user;
    }
}
