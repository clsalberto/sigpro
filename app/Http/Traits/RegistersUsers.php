<?php

namespace App\Http\Traits;

use App\Mail\RegisteredUser;
use App\Mail\UserRegistration;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;

use App\User;
use App\Role;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        $users = User::orderBy('role_id')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterUser()
    {
        $types = Role::orderBy('name')->get();
        return view('users.create', compact('types'));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserEdit($id)
    {
        $user = User::with('role')->find($id);

        $types = Role::orderBy('name')->get();

        return view('users.edit', compact(['types', 'user']));
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
            'email' => 'required|string|email|max:255|unique:users',
            'type' => 'required|integer',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEditUser(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'type' => 'required|integer',
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
        $data = $request->toArray();

        $password = generate_password();

        $data = array_add($data, 'password', $password);
        $this->validator($data)->validate();

        event(new Registered($user = $this->create($data)));

        return $this->registered($user, $password) ?: redirect($this->redirectPath());
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->toArray();

        $password = generate_password();

        $data = array_add($data, 'password', $password);
        $this->validator($data)->validate();

        event(new Registered($user = $this->create($data)));

        return $this->registered($user, $password) ?: redirect($this->redirectPath())
            ->with('success', 'Usuário registrado com sucesso!');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request, $id)
    {
        $data = $request->all();

        $this->validatorEditUser($data)->validate();

        $this->updateUser($data, $id);

        return redirect($this->redirectPath())->with('success', 'Usuário alterado com sucesso!');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(User $user, $password)
    {
        return Mail::to($user->email)
            ->send(new RegisteredUser($user, $password));
    }
}
