<?php

use Illuminate\Database\Seeder;

use App\ClassDate;
use App\Registration;

class FrequencyTableSeeder extends Seeder
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
            $classDates = ClassDate::all();

            foreach ($classDates as $classDate) {
                $registration->frequencies()->create([
                    'class_date_id' => $classDate->id,
                    'presence' => false
                ]);
            }
        }
    }
}
