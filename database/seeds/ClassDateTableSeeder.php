<?php

use Illuminate\Database\Seeder;

use App\Room;

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

            $idate = new DateTime($room->initial_date);
            $fdate = new DateTime($room->final_date);

        	while ($idate <= $fdate) {
        		$room->classDates()->create([
        			'room_id' => $room->id,
        			'class_date' => $idate->format('Y-m-d'),
        			'avaliation' => false
        		]);
                $idate = $idate->modify('+1day');
        	}

        }
    }
}
