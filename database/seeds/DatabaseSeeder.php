<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatesSeeder::class,
            CitiesSeeder::class,
            UsersSeeder::class,
            RolesGroupsSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
            RolesPermissionsSeeder::class,
            RoleUserSeeder::class
        ]);
    }
}
