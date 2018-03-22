<?php

use Illuminate\Database\Seeder;
use App\Formula;

class FormulaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formula::create([
            'type' => ' ',
            'description' => null,
        ]);

        Formula::create([
            'type' => 'AP1 + AF',
            'description' => null,
        ]);

        Formula::create([
            'type' => 'AP1 + AP2 + AF',
            'description' => null,
        ]);
    }
}
