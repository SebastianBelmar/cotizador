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

        Permission::create(['name' => 'admin.home','description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create','description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Asignar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.productos.index','description' => 'Ver listado de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.create','description' => 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.edit','description' => 'Editar un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy','description' => 'Eliminar un producto'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bills.index','description' => 'Ver listado de cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.create','description' => 'Crear cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.edit','description' => 'Editar cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.destroy','description' => 'Eliminar cotizaciones'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.clientes.index','description' => 'Ver listado de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.create','description' => 'Crear clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.edit','description' => 'Editar clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.destroy','description' => 'Eliminar clientes'])->syncRoles([$role1]);
    }
}
