<?php

use App\ClassDate;
use App\Registration;
use Illuminate\Database\Seeder;

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
            $classDates = ClassDate::where('avaliation', true)->get();

            foreach ($classDates as $classDate) {
                $registration->scores()->create([
                    'class_date_id' => $classDate->id,
                ]);
            }
        }
    }
}
