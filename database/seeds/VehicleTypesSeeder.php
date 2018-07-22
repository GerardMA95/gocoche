<?php

use Illuminate\Database\Seeder;

class VehicleTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('vehicle_types')->get()->count() == 0){
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('vehicle_types')->insert([
                [
                    'name' => 'Cabrio',
                    'description' => 'Test',
                ],
                [
                    'name' => 'Berlina',
                    'description' => 'Test',
                ]
            ]);
        } else { echo "\e[31mTable vehicle_types is not empty"; }
    }
}
