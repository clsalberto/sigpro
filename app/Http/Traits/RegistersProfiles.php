<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Traits\RegistersImages;

trait RegistersProfiles
{
    use RedirectsUsers, RegistersImages;

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        $user = $this->getUser();
        return view('profile.show', compact('user'));
    }

    /**
     * Show the application registration profile form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileForm()
    {
        $user = $this->getUser();
        return view('profile.edit', compact('user'));
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
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'surname' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'address' => 'required|string|max:255',
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

        event(new Registered($user = $this->update($request->all(), $this->getUser()->id)));

        return $this->registered($request, $user) ?:
            redirect($this->redirectPath())
                ->with('success', 'Dados atualizados com sucesso!');
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