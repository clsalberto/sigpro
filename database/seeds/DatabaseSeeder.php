<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $environment = getenv('APP_ENV') ?: 'production';

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ModalityTableSeeder::class);
        $this->call(ModalityUserTableSeeder::class);
        $this->call(PactTableSeeder::class);

        //if ($environment != 'production') {
            $this->call(CourseTableSeeder::class);
            $this->call(ModuleTableSeeder::class);
            $this->call(CityTableSeeder::class);
            $this->call(RoomTableSeeder::class);
            $this->call(RoomUserTableSeeder::class);
            $this->call(StudentTableSeeder::class);
            $this->call(RegistrationTableSeeder::class);
            $this->call(ClassDateTableSeeder::class);
            $this->call(FrequencyTableSeeder::class);
            $this->call(ScoreTableSeeder::class);
       //}
    }
}
