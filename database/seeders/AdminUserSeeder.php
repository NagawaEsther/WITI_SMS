<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Find or create the admin role
         $adminRole = Role::where('name', 'admin')->first();
      //   dd("here",$adminRole->id);

         // Create an admin user
         $admin = User::create([
             'first_name' => 'Admin',
             'last_name' => 'System',
             'email' => 'admin@witi.com',
             'phone_number' => '0123456789',
             'password' => Hash::make('password123'), 
             'image' => null, 
             'status' => 'active',
             'phone_number_two' => '0751337291',
             'role_id'=>$adminRole->id
         ]);
 
         // Assign the admin role to the user
         $admin->assignRole($adminRole);
    }
}
