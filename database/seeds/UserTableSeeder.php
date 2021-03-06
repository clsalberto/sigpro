<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alexandre',
            'email' => 'amelo@teste.com',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);

        $user->profile()->create();
    }
}
