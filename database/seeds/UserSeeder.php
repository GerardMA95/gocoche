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
            DB::table('users')->insert([
                [
                    'name' => 'test',
                    'email' => 'test@test.com',
                    'password' => bcrypt('1234'),
                    'role_id' => 4
                ]
            ]);
        } else { echo "\e[31mTable user_roles is not empty"; }
    }
}
