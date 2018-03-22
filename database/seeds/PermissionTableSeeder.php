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
        	'name' => 'Visualizar lista de usuários',
        	'slug' => 'view-users'
        ]);

        Permission::create([
        	'name' => 'Visualizar listas de frequências',
        	'slug' => 'view-frequencies'
        ]);

        Permission::create([
        	'name' => 'Lançar listas de frequências',
        	'slug' => 'post-frequencies'
        ]);

        Permission::create([
        	'name' => 'Visualizar listas de notas',
        	'slug' => 'view-scores'
        ]);

        Permission::create([
        	'name' => 'Lançar listas de notas',
        	'slug' => 'post-scores'
        ]);

        Permission::create([
        	'name' => 'Lançar notas de avaliação parcial (AP1)',
        	'slug' => 'post-score-punctuation-a'
        ]);

        Permission::create([
        	'name' => 'Lançar notas de avaliação parcial (AP2)',
        	'slug' => 'post-score-punctuation-b'
        ]);

        Permission::create([
        	'name' => 'Lançar notas de avaliação final (AF)',
        	'slug' => 'post-score-punctuation-c'
        ]);

        Permission::create([
        	'name' => 'Lançar notas de recuperação final (RF)',
        	'slug' => 'post-score-punctuation-d'
        ]);
    }
}
