<?php

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
        /*
         * Aluno 01
         */
        Registration::create([
	        'student_id' => 101,
	        'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 101,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 101,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 101,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 101,
            'room_id' => 5,
        ]);

        /*
         * Aluno 02
         */
        Registration::create([
            'student_id' => 102,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 102,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 102,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 102,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 102,
            'room_id' => 5,
        ]);

        /*
         * Aluno 03
         */
        Registration::create([
            'student_id' => 103,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 103,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 103,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 103,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 103,
            'room_id' => 5,
        ]);

        /*
         * Aluno 04
         */
        Registration::create([
            'student_id' => 104,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 104,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 104,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 104,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 104,
            'room_id' => 5,
        ]);

        /*
         * Aluno 05
         */
        Registration::create([
            'student_id' => 105,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 105,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 105,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 105,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 105,
            'room_id' => 5,
        ]);

        /*
         * Aluno 06
         */
        Registration::create([
            'student_id' => 106,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 106,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 106,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 106,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 106,
            'room_id' => 5,
        ]);

        /*
         * Aluno 07
         */
        Registration::create([
            'student_id' => 107,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 107,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 107,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 107,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 107,
            'room_id' => 5,
        ]);

        /*
         * Aluno 08
         */
        Registration::create([
            'student_id' => 108,
            'room_id' => 1,
        ]);

        Registration::create([
            'student_id' => 108,
            'room_id' => 2,
        ]);

        Registration::create([
            'student_id' => 108,
            'room_id' => 3,
        ]);

        Registration::create([
            'student_id' => 108,
            'room_id' => 4,
        ]);

        Registration::create([
            'student_id' => 108,
            'room_id' => 5,
        ]);
    }
}
