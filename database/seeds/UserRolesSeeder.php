<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('user_roles')->get()->count() == 0) {
            DB::table('user_roles')->insert([
                [
                    'id' => 1,
                    'name' => 'Usuario',
                    'display_name' => 'Usuario web',
                    'description' => '',
                ],
                [
                    'id' => 2,
                    'name' => 'Usuario premium',
                    'display_name' => 'Usuario web premium',
                    'description' => ''
                ],
                [
                    'id' => 3,
                    'name' => 'Root',
                    'display_name' => 'Root',
                    'description' => ''
                ],
                [
                    'id' => 4,
                    'name' => 'Admin',
                    'display_name' => 'Administrador',
                    'description' => ''
                ]
            ]);
        } else {
            echo "\e[31mTable user_roles is not empty";
        }
    }
}
