<?php

use Illuminate\Database\Seeder;

use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['id' => 2300408, 'name' => 'AIUABA']);
        City::create(['id' => 2300754, 'name' => 'AMONTADA']);
        City::create(['id' => 2301000, 'name' => 'AQUIRAZ']);
        City::create(['id' => 2301109, 'name' => 'ARACATI']);
        City::create(['id' => 2301505, 'name' => 'ARNEIROZ']);
        City::create(['id' => 2301851, 'name' => 'BANABUIÚ']);
        City::create(['id' => 2302206, 'name' => 'BEBERIBE']);
        City::create(['id' => 2302800, 'name' => 'CANINDÉ']);
        City::create(['id' => 2303501, 'name' => 'CASCAVEL']);
        City::create(['id' => 2303931, 'name' => 'CHORÓ']);
        City::create(['id' => 2306405, 'name' => 'ITAPIPOCA']);
        City::create(['id' => 2307304, 'name' => 'JUAZEIRO DO NORTE']);
        City::create(['id' => 2307601, 'name' => 'LIMOEIRO DO NORTE']);
        City::create(['id' => 2308104, 'name' => 'MAURITI']);
        City::create(['id' => 2310209, 'name' => 'PARACURU']);
        City::create(['id' => 2310308, 'name' => 'PARAMBU']);
        City::create(['id' => 2311264, 'name' => 'QUITERIANÓPOLIS']);
        City::create(['id' => 2311306, 'name' => 'QUIXADÁ']);
        City::create(['id' => 2311405, 'name' => 'QUIXERAMOBIM']);
        City::create(['id' => 2312700, 'name' => 'SENADOR POMPEU']);
        City::create(['id' => 2313302, 'name' => 'TAUÁ']);
        City::create(['id' => 2313500, 'name' => 'TRAIRI']);
        City::create(['id' => 2313559, 'name' => 'TURURU']);

    }
}
