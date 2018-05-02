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
            DB::table('patterns')->insert([
                [
                    'name' => 'Focus',
                    'description' => 'Modelo de test',
                    'places' => '5',
                    'doors' => '5',
                    'patent_id' => '1',
                    'vehicle_type_id' => '2',
                ],
                [
                    'name' => 'Serie 1',
                    'description' => 'Modelo de test',
                    'places' => '5',
                    'doors' => '5',
                    'patent_id' => '2',
                    'vehicle_type_id' => '1',
                ]
            ]);
        } else { echo "\e[31mTable patterns is not empty"; }
    }
}
