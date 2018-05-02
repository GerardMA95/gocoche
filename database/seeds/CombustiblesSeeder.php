<?php

use Illuminate\Database\Seeder;

class CombustiblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('combustibles')->get()->count() == 0){
            DB::table('combustibles')->insert([
                [
                    'name' => 'Diésel',
                    'description' => 'Test',
                ],
                [
                    'name' => 'Gasolina',
                    'description' => 'Test',
                ]
            ]);
        } else { echo "\e[31mTable combustibles is not empty"; }
    }
}
