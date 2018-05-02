<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserRolesSeeder::class,
                UserSeeder::class,
                CombustiblesSeeder::class,
                EmissionRegulationsSeeder::class,
                GearshiftsSeeder::class,
                TractionsSeeder::class,
                VehicleTypesSeeder::class,
                PatentsSeeder::class,
                PatternsSeeder::class,
            ]
        );
    }
}
