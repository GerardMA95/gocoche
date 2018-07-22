<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0){
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('users')->insert([
                [
                    'name' => 'Administrador',
                    'email' => 'admin@qualityluxecars.com',
                    'password' => bcrypt('Qwerty123456_'),
                    'role_id' => 4,
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else { echo "\e[31mTable user_roles is not empty"; }
    }
}
