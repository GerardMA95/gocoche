<?php

use Illuminate\Database\Seeder;

class PatentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('patents')->get()->count() == 0){
            DB::table('patents')->insert([
                [
                    'name' => 'Ford',
                    'short_name' => 'FORD',
                    'description' => 'Marca de test',
                ],
                [
                    'name' => 'BMW',
                    'short_name' => 'BMW',
                    'description' => 'Marca de test',
                ]
            ]);
        } else { echo "\e[31mTable patents is not empty"; }
    }
}
