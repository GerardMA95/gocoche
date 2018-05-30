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
            DB::table('colors')->insert([
                [
                    'name' => 'Blanco Perla'
                ],
                [
                    'name' => 'Negro'
                ]
            ]);
        } else { echo "\e[31mTable combustibles is not empty"; }
    }
}
