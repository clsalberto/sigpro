<?php

use Illuminate\Database\Seeder;

use App\Room;
use Carbon\Carbon;

class ClassDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = Room::all();

        foreach ($rooms as $room) {

            $date = Carbon::now();

        	for ($i = 1; $i < 25; $i++) {
        		$classDate = $room->classDates()->create([
        			'room_id' => $room->id,
        			'class_date' => $date->addDays(3),
        			'avaliation' => $avaliation = ($i % 5 == 0) ? true : false
        		]);
        	}

        }
    }
}
