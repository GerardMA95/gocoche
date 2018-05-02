<?php

use Illuminate\Database\Seeder;

class GearshiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('gearshifts')->get()->count() == 0){
            DB::table('gearshifts')->insert([
                [
                    'name' => 'Manual 5 marchas',
                    'description' => 'Test',
                ],
                [
                    'name' => 'Manual 6 marchas',
                    'description' => 'Test',
                ]
            ]);
        } else { echo "\e[31mTable vehicle_types is not empty"; }
    }
}
