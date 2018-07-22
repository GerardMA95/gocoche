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
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('gearshifts')->insert([
                [
                    'name' => 'Manual 5 marchas',
                    'description' => 'Manual 5 marchas',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Manual 6 marchas',
                    'description' => 'Manual 6 marchas',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable vehicle_types is not empty"; }
    }
}
