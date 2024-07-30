<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);

        // Optional: Create some permissions
        $permissions = ['manage users', 'edit articles', 'delete articles'];
        foreach ($permissions as $perm) {
            $permission = Permission::create(['name' => $perm]);
            $adminRole->givePermissionTo($permission);
        }

        $user = User::where('email', 'a@gmail.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        } else {
            echo "User not found, creating a new admin user.\n";
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'a@gmail.com',
                'password' => bcrypt('password') // You should change this accordingly
            ]);
            $user->assignRole($adminRole);
        }
    }
}
