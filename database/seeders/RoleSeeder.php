<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Seller']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bills.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bills'])->syncRoles([$role1, $role2]);
    }
}
