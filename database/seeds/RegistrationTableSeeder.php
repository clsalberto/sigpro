<?php

use App\Room;
use App\Student;
use Illuminate\Database\Seeder;

use App\Registration;

class RegistrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = Room::all();
        $students = Student::all();

        foreach ($students as $student)
        {
            foreach ($rooms as $room)
            {
                Registration::create([
                    'room_id' => $room->id,
                    'student_id' => $student->id
                ]);
            }
        }
    }
}
