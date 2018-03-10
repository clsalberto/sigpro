<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrador']);
        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $role = Role::create(['name' => 'Coordenador']);
        $role->permissions()->attach([3, 4, 5, 6, 7, 8, 9, 10]);

        $role = Role::create(['name' => 'Professor']);
        $role->permissions()->attach([3, 4, 5, 6, 7, 8, 9, 10]);
    }
}
