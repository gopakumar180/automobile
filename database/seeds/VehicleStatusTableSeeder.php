<?php

use Illuminate\Database\Seeder;

class VehicleStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_status')->delete();

        DB::table('vehicle_status')->insert(['id' =>1,'status' => "Disabled"]);
        DB::table('vehicle_status')->insert(['id' =>2,'status' => "Enabled"]);
        DB::table('vehicle_status')->insert(['id' =>3,'status' => "Purchased"]);
        DB::table('vehicle_status')->insert(['id' =>4,'status' => "Sold"]);
        DB::table('vehicle_status')->insert(['id' =>5,'status' => "Forwarded to own branch"]);
        DB::table('vehicle_status')->insert(['id' =>6,'status' => "Sales Returned"]);
        DB::table('vehicle_status')->insert(['id' =>7,'status' => "Booked"]);
    }
}
