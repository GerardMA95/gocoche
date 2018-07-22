<?php

use Illuminate\Database\Seeder;

class EmissionRegulationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('emission_regulations')->get()->count() == 0){
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('emission_regulations')->insert([
                [
                    'name' => 'Por determinar',
                    'description' => 'Por determinar',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'EURO 5',
                    'description' => 'EURO 5',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'EURO 6',
                    'description' => 'EURO 6',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable emission_regulations is not empty"; }
    }
}
