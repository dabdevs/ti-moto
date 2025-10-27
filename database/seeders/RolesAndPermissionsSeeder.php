<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Passender permissions
        Permission::create(['name' => 'create-ride']);
        Permission::create(['name' => 'view-own-rides']);
        Permission::create(['name' => 'cancel-ride']);

        // Driver permissions
        Permission::create(['name' => 'accept-ride']);
        Permission::create(['name' => 'complete-ride']);
        Permission::create(['name' => 'view-assigned-rides']);
        Permission::create(['name' => 'cancel-assigned-ride']);
        Permission::create(['name' => 'update-vehicle-info']);

        // Common permissions
        Permission::create(['name' => 'update-profile']);
        Permission::create(['name' => 'add-payment-method']);

        // Admin permissions
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'manage-rides']);
        Permission::create(['name' => 'manage-payments']);
        Permission::create(['name' => 'assign-roles']);
        Permission::create(['name' => 'manage-permissions']);
        Permission::create(['name' => 'view-reports']);

        // Create roles and assign existing permissions
        $driver = Role::create(['name' => 'driver']);
        $driver->givePermissionTo(['accept-ride', 'complete-ride', 'view-assigned-rides', 'cancel-assigned-ride', 'update-vehicle-info', 'update-profile', 'add-payment-method']);

        $passenger = Role::create(['name' => 'passenger']);
        $passenger->givePermissionTo(['create-ride', 'view-own-rides', 'cancel-ride', 'update-profile', 'add-payment-method']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }
}
