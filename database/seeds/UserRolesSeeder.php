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
            $dt = \Carbon\Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('user_roles')->insert([
                [
                    'id' => 1,
                    'name' => 'Usuario',
                    'display_name' => 'Usuario web',
                    'description' => '',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'id' => 2,
                    'name' => 'Usuario premium',
                    'display_name' => 'Usuario web premium',
                    'description' => '',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'id' => 3,
                    'name' => 'Root',
                    'display_name' => 'Root',
                    'description' => '',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ],
                [
                    'id' => 4,
                    'name' => 'Admin',
                    'display_name' => 'Administrador',
                    'description' => '',
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ]
            ]);
        } else {
            echo "\e[31mTable user_roles is not empty";
        }
    }
}
