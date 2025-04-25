<?php

namespace Database\Seeders;

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
    //    Registering seeders
       $this->call(RolesAndPermissionsSeeder::class);
       $this->call(AdminUserSeeder::class);
    }
}
