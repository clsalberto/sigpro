<?php

use Illuminate\Database\Seeder;

use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['id' => 173, 'modality_id' => 1, 'name' => 'Técnico em Agronegócio']);
    }
}
