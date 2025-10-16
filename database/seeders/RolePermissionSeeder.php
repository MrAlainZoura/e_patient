<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guard = 'api'; // pour api jwt

        // Création des permissions
        $permissions = ['read', 'create', 'update', 'delete'];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => $guard
            ]);
        }

        // Rôle admin avec toutes les permissions
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => $guard
        ]);
        $adminRole->syncPermissions(Permission::all());

        // Rôle user avec read et create
        $userRole = Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => $guard
        ]);
        $userRole->syncPermissions(Permission::whereIn('name', ['read', 'create'])->get());

        // Attribution des rôles aux utilisateurs
        $user = User::firstOrCreate(['name' => 'Alain', 'email'=>"alain@ep.cd", 'password'=>Hash::make('0000')]);
        if ($user) {
            $user->assignRole('admin');
        }

    }
}
