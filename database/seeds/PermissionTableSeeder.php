<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'name' => 'Criar novos usuários',
        	'slug' => 'create-users'
        ]);

        Permission::create([
        	'name' => 'Ver lista de usuários',
        	'slug' => 'view-users'
        ]);

        Permission::create([
        	'name' => 'Ver frequências',
        	'slug' => 'view-frequencies'
        ]);

        Permission::create([
        	'name' => 'Lançar frequências',
        	'slug' => 'post-frequencies'
        ]);

        Permission::create([
        	'name' => 'Ver notas',
        	'slug' => 'view-scores'
        ]);

        Permission::create([
        	'name' => 'Lançar notas',
        	'slug' => 'post-scores'
        ]);

        Permission::create([
        	'name' => 'Lançar notas AP1',
        	'slug' => 'post-score-punctuation-a'
        ]);

        Permission::create([
        	'name' => 'Lançar notas AP2',
        	'slug' => 'post-score-punctuation-b'
        ]);

        Permission::create([
        	'name' => 'Lançar notas AF',
        	'slug' => 'post-score-punctuation-c'
        ]);

        Permission::create([
        	'name' => 'Lançar notas RF',
        	'slug' => 'post-score-punctuation-d'
        ]);
    }
}
