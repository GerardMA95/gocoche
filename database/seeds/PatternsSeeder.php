<?php

use Illuminate\Database\Seeder;

class PatternsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('patterns')->get()->count() == 0){
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('patterns')->insert([
                [
                    'name' => 'Focus',
                    'short_name' => 'Focus',
                    'description' => 'Modelo de test',
                    'places' => '5',
                    'doors' => '5',
                    'patent_id' => '1',
                    'vehicle_type_id' => '2',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Serie 1',
                    'short_name' => 'Serie_1',
                    'description' => 'Modelo de test',
                    'places' => '5',
                    'doors' => '5',
                    'patent_id' => '2',
                    'vehicle_type_id' => '1',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable patterns is not empty"; }
    }
}
