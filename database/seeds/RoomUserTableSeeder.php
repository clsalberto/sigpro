<?php

use Illuminate\Database\Seeder;

use App\User;

class RoomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->rooms()->sync([1, 2, 3, 4, 5]);
    }
}
