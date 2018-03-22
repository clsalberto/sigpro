<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersPasswords
{
    use RedirectsUsers;

    /**
     * Show the application registration profile form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm()
    {
        $user = $this->getUser();
        return view('profile.password', compact('user'));
    }

    /**
     * Return current user
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected function getUser()
    {
        return Auth::user();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if (!Hash::check($request->current_password, $this->getUser()->getAuthPassword()))
        {
            return redirect()->route('password.edit')->withErrors(['current_password' => 'Senha incorreta']);
        }
        event(new Registered($user = $this->update($request->all(), $this->getUser()->id)));
        return $this->registered($request, $user) ?: redirect($this->redirectPath())->with('success', 'Sua senha foi alterada com sucesso!');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}