<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();

        DB::table('companies')->insert(['id' =>1,'title' => "Ford"]);
        DB::table('companies')->insert(['id' =>2,'title' => "Mahindra"]);
        DB::table('companies')->insert(['id' =>3,'title' => "Toyota"]);
        DB::table('companies')->insert(['id' =>4,'title' => "Nissan"]);
        DB::table('companies')->insert(['id' =>5,'title' => "Volkswagen"]);
        
       /*  DB::table('companies')->insert(['id' =>2,'title' => "BMW Platino Classic"]);
        DB::table('companies')->insert(['id' =>3,'title' => "Maruti Suzuki India limited"]);
        DB::table('companies')->insert(['id' =>4,'title' => "Mahindra"]);
        DB::table('companies')->insert(['id' =>5,'title' => "Hyundai"]);
        DB::table('companies')->insert(['id' =>6,'title' => "Honda"]);
        DB::table('companies')->insert(['id' =>7,'title' => "Tata Motors"]);
        DB::table('companies')->insert(['id' =>8,'title' => "Toyota"]);
        DB::table('companies')->insert(['id' =>9,'title' => "Renault"]);
        DB::table('companies')->insert(['id' =>10,'title' => "Nissan"]);
        DB::table('companies')->insert(['id' =>11,'title' => "Volkswagen"]); */
    }
}
