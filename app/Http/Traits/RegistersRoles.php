<?php

namespace App\Http\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;

use App\Role;
use App\Permission;

trait RegistersRoles
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoles()
    {
        $roles = Role::orderBy('name')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterRole()
    {
        $permissions = Permission::with('roles')->orderBy('id')->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoleEdit($id)
    {
    	$role = Role::with('permissions')->find($id);
        $permissions = Permission::with('roles')->orderBy('id')->get();
        return view('roles.edit', compact(['permissions', 'role']));
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
            'name' => 'required|string|max:255'
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
        $data = $request->all();

        $this->validator($data)->validate();

        $role = $this->create($data);

        return $this->registered($role) ?: redirect($this->redirectPath())
        	->with('success', 'Tipo criado com sucesso!');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $role = $this->edit($data, $id);

        return $this->registered($role) ?: redirect($this->redirectPath())
            ->with('success', 'Tipo atualizado com sucesso!');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Role $role)
    {
        //
    }
}
