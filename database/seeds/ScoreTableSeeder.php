<?php

use Illuminate\Database\Seeder;

use App\ClassDate;
use App\Registration;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrations = Registration::all();

        foreach ($registrations as $registration)
        {
            $registration->score()->create();
        }
    }
}
