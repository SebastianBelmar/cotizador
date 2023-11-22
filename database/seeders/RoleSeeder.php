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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Vendedor']);

        Permission::create(['name' => 'admin.bills.index','description' => 'Ver listado de cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.create','description' => 'Crear cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.edit','description' => 'Editar cotizaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bills.destroy','description' => 'Eliminar cotizaciones'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.clientes.index','description' => 'Ver listado de clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.create','description' => 'Crear clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.edit','description' => 'Editar clientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes.destroy','description' => 'Eliminar clientes'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.productos.index','description' => 'Ver listado de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.create','description' => 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.edit','description' => 'Editar productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy','description' => 'Eliminar productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.detalles.index','description' => 'Ver listado de detalles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detalles.create','description' => 'Crear detalles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detalles.edit','description' => 'Editar detalles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.detalles.destroy','description' => 'Eliminar detalles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.terminos.index','description' => 'Ver listado de términos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.terminos.create','description' => 'Crear términos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.terminos.edit','description' => 'Editar términos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.terminos.destroy','description' => 'Eliminar términos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.datos-empresas.edit','description' => 'Editar datos de empresa'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create','description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index','description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create','description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit','description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description' => 'Eliminar roles'])->syncRoles([$role1]);

    }
}
