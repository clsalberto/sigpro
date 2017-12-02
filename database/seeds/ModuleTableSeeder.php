<?php

use Illuminate\Database\Seeder;

use App\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create(['course_id' => 173,	'description' => 'Introdução ao Curso e Ética Profissional', 'workload' => 20]);
        Module::create(['course_id' => 173,	'description' => 'Informática Básica', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Princípios de Agroecologia e Prática de Convivência com o Semiárido ', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Fundamentos do Agronegócio', 'workload' => 20]);
        Module::create(['course_id' => 173,	'description' => 'Manejo da Água e do Solo', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Olericultura', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Aquicultura', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Associativismo e Cooperativismo', 'workload' => 40]);
        Module::create(['course_id' => 173,	'description' => 'Mercado e Comercialização agrícola', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Floricultura', 'workload' => 40]);
        Module::create(['course_id' => 173,	'description' => 'Logística Aplicada ao Agronegócio', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Produção de Culturas Anuais', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Qualidade e Certificação', 'workload' => 20]);
        Module::create(['course_id' => 173,	'description' => 'Fruticultura', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Avicultura e Suinocultura', 'workload' => 80]);
        Module::create(['course_id' => 173,	'description' => 'Extensão Rural', 'workload' => 40]);
        Module::create(['course_id' => 173,	'description' => 'Planejamento e Gestão Rural', 'workload' => 80]);
        Module::create(['course_id' => 173,	'description' => 'Projetos e Empreendedorismo Rural', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Bovinocultura', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Ovinocaprinocultura', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Produção de Alimentos e Alimentação  Animal', 'workload' => 60]);
        Module::create(['course_id' => 173,	'description' => 'Projeto de Negócio/Vida – (TCC)', 'workload' => 80]);
    }
}
