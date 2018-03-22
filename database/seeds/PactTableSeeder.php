<?php

use Illuminate\Database\Seeder;

use App\Modality;

class PactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modality = Modality::find(1);
        $modality->pacts()->createMany([
            ['id' => 8352, 'year' => 2017, 'active' => true],
        ]);

        $modality = Modality::find(13);
        $modality->pacts()->createMany([
            ['id' => 9153, 'year' => 2017, 'active' => true],
        ]);
    }
}
