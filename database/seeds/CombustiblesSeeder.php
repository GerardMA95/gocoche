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
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('combustibles')->insert([
                [
                    'name' => 'Diésel',
                    'description' => 'Diésel',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Gasolina',
                    'description' => 'Gasolina',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable combustibles is not empty"; }
    }
}
