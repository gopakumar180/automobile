<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(['id' =>1,'title' => "Car"]);
        DB::table('categories')->insert(['id' =>2,'title' => "Bus"]);
        DB::table('categories')->insert(['id' =>3,'title' => "Bike"]);
        DB::table('categories')->insert(['id' =>4,'title' => "Jeep"]);
        DB::table('categories')->insert(['id' =>5,'title' => "Lorry"]);
        DB::table('categories')->insert(['id' =>6,'title' => "AutoRikshaw"]);
    }
}
