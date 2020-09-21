<?php

use Illuminate\Database\Seeder;

class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_models')->delete();

        DB::table('vehicle_models')->insert(['company_id'=>1 ,'title' => "Ford EcoSport"]);
        DB::table('vehicle_models')->insert(['company_id'=>1 ,'title' => "Ford Endeavour"]);
        DB::table('vehicle_models')->insert(['company_id'=>1 ,'title' => "Ford FreeStyle"]);
        DB::table('vehicle_models')->insert(['company_id'=>2,'title' => "Mahindra NuvoSport "]);
        DB::table('vehicle_models')->insert(['company_id'=>2,'title' => "Mahindra Scorpio"]);
        DB::table('vehicle_models')->insert(['company_id'=>2 ,'title' => "Mahindra Bolero"]);
        DB::table('vehicle_models')->insert(['company_id'=>3 ,'title' => "Toyota Innova"]);
        DB::table('vehicle_models')->insert(['company_id'=>3 ,'title' => "Toyota Etios"]);
        DB::table('vehicle_models')->insert(['company_id'=>4,'title' => "Nissan GT-R"]);
        DB::table('vehicle_models')->insert(['company_id'=>4 ,'title' => "Nissan Micra"]);
        DB::table('vehicle_models')->insert(['company_id'=>5 ,'title' => "Volkswagen Polo"]);
    }
}
