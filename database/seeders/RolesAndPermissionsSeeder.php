<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create permissions
         $viewDashboard = Permission::create(['name' => 'view dashboard']);
         $manageUsers = Permission::create(['name' => 'manage users']);
         
         // Create roles and assign permissions
         $adminRole = Role::create(['name' => 'admin']);
         $studentRole = Role::create(['name' => 'student']);
        
 
         // Assign permissions to admin role
         $adminRole->givePermissionTo([$viewDashboard, $manageUsers]);
 
         // You can assign permissions to the user role, if needed
         $studentRole->givePermissionTo($viewDashboard);
    }
}


