<?php

use Illuminate\Database\Seeder;

use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'id' => 101,
        	'name' => 'Maria Cecilia',
	        'surname' => 'Oliveira',
	        'gender' => 'F',
	        'email' => 'mco@teste.com',
	        'cpf' => '123.456.789-00'
        ]);

        Student::create([
            'id' => 102,
            'name' => 'José Mendes',
            'surname' => 'Oliveira',
            'gender' => 'M',
            'email' => 'jmo@teste.com',
            'cpf' => '123.456.709-01'
        ]);

        Student::create([
            'id' => 103,
            'name' => 'Mariana Azevedo',
            'surname' => 'Oliveira',
            'gender' => 'F',
            'email' => 'mao@teste.com',
            'cpf' => '123.456.789-02'
        ]);

        Student::create([
            'id' => 104,
            'name' => 'Mario Mendes',
            'surname' => 'Sipriano',
            'gender' => 'M',
            'email' => 'mms@teste.com',
            'cpf' => '123.456.709-03'
        ]);

        Student::create([
            'id' => 105,
            'name' => 'Aline Jaime',
            'surname' => 'Oliveira',
            'gender' => 'F',
            'email' => 'ajo@teste.com',
            'cpf' => '123.456.789-04'
        ]);

        Student::create([
            'id' => 106,
            'name' => 'Silverio Mendes',
            'surname' => 'Oliveira',
            'gender' => 'M',
            'email' => 'smo@teste.com',
            'cpf' => '123.456.709-05'
        ]);

        Student::create([
            'id' => 107,
            'name' => 'Joelma',
            'surname' => 'Joseja Oliveira',
            'gender' => 'F',
            'email' => 'jjo@teste.com',
            'cpf' => '123.456.789-06'
        ]);

        Student::create([
            'id' => 108,
            'name' => 'Murilo Garlo',
            'surname' => 'Oliveira',
            'gender' => 'M',
            'email' => 'mgo@teste.com',
            'cpf' => '123.456.709-07'
        ]);
    }
}
