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
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('tractions')->insert([
                [
                    'name' => 'Tracción delantera',
                    'description' => 'Tracción delantera',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Tracción total',
                    'description' => 'Tracción total',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable tractions is not empty"; }
    }
}
