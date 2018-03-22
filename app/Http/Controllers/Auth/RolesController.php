<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\RegistersRoles;
use App\Role;

class RolesController extends Controller
{
    use RegistersRoles;

    /**
     * Where to redirect roles after registration.
     *
     * @var string
     */
    protected $redirectTo = '/roles';

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
     * Create a new role instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Role
     */
    protected function create(array $data)
    {
        $role = Role::create([
            'name' => proper_case($data['name'])
        ]);

        $role->permissions()->sync($data['permissions']);

        return $role;
    }

    /**
     * Edit role instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Role
     */
    protected function edit(array $data, $id)
    {
        $role = Role::find($id);
        $role->name = proper_case($data['name']);
        $role->save();

        $role->permissions()->sync($data['permissions']);

        return $role;
    }
}