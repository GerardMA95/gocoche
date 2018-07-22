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
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('patents')->insert([
                [
                    'name' => 'Audi',
                    'short_name' => 'AUDI',
                    'description' => 'Audi',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'BMW',
                    'short_name' => 'BMW',
                    'description' => 'BMW',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Bugatti',
                    'short_name' => 'BUGATTI',
                    'description' => 'Bugatti',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Ferrari',
                    'short_name' => 'FERRARI',
                    'description' => 'Ferrari',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Porsche',
                    'short_name' => 'PORSCHE',
                    'description' => 'Porsche',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Mercedes',
                    'short_name' => 'MERCEDES',
                    'description' => 'Mercedes',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'name' => 'Volkswagen',
                    'short_name' => 'VOLKSWAGEN',
                    'description' => 'Volkswagen',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
            ]);
        } else { echo "\e[31mTable patents is not empty"; }
    }
}
