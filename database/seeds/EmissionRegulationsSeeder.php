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
            DB::table('emission_regulations')->insert([
                [
                    'name' => 'EURO 5',
                    'description' => 'Test',
                ],
                [
                    'name' => 'EURO 6',
                    'description' => 'Test',
                ]
            ]);
        } else { echo "\e[31mTable emission_regulations is not empty"; }
    }
}
