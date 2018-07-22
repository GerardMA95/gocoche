<?php

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('colors')->get()->count() == 0){
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('colors')->insert([
                [
                    'name' => 'Blanco Perla',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Negro',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable combustibles is not empty"; }
    }
}
