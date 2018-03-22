<?php

use Illuminate\Database\Seeder;

use App\Modality;

class ModalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modality::create(['id' => 1, 'name' => 'MedioTec']);
        Modality::create(['id' => 13, 'name' => 'Fic']);
    }
}
