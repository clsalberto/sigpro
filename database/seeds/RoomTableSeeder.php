<?php

use Illuminate\Database\Seeder;

use App\Room;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idate = new DateTime(date('Y-m-d', strtotime('-3 week')));
        $fdate = new DateTime(date('Y-m-d', strtotime('+3 week')));

        Room::create(['id' => 1, 'course_id' => 173, 'module_id' => 1, 'pact_id' => 8352, 'city_id' => 2301000, 'shift' => 'D', 'initial_date' => $idate->format('Y-m-d'), 'final_date' => $fdate->format('Y-m-d'), 'formula_id' => 1]);
        Room::create(['id' => 2, 'course_id' => 173, 'module_id' => 2, 'pact_id' => 8352, 'city_id' => 2307304, 'shift' => 'D', 'initial_date' => $idate->format('Y-m-d'), 'final_date' => $fdate->format('Y-m-d'), 'formula_id' => 1]);
        Room::create(['id' => 3, 'course_id' => 173, 'module_id' => 4, 'pact_id' => 8352, 'city_id' => 2301000, 'shift' => 'N', 'initial_date' => $idate->format('Y-m-d'), 'final_date' => $fdate->format('Y-m-d'), 'formula_id' => 1]);
        Room::create(['id' => 4, 'course_id' => 173, 'module_id' => 4, 'pact_id' => 8352, 'city_id' => 2312700, 'shift' => 'D', 'initial_date' => $idate->format('Y-m-d'), 'final_date' => $fdate->format('Y-m-d'), 'formula_id' => 1]);
        Room::create(['id' => 5, 'course_id' => 173, 'module_id' => 5, 'pact_id' => 8352, 'city_id' => 2301000, 'shift' => 'N', 'initial_date' => $idate->format('Y-m-d'), 'final_date' => $fdate->format('Y-m-d'), 'formula_id' => 1]);
    }
}
