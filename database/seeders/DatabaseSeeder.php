<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'addd']);

        // Tạo vai trò
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Gán toàn bộ quyền cho admin
        $adminRole->syncPermissions(Permission::all());

        // Gán vai trò cho user
        $admin = User::find(1);
        $admin->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('user');
    }
}
