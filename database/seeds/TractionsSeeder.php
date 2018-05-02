<?php

use Illuminate\Database\Seeder;

class TractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('tractions')->get()->count() == 0){
            DB::table('tractions')->insert([
                [
                    'name' => 'Tracción delantera',
                    'description' => 'Test',
                ],
                [
                    'name' => 'Tracción total',
                    'description' => 'Test',
                ]
            ]);
        } else { echo "\e[31mTable tractions is not empty"; }
    }
}
