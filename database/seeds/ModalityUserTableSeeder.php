<?php

use Illuminate\Database\Seeder;

use App\User;

class ModalityUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->modalities()->sync([1, 13]);
    }
}
