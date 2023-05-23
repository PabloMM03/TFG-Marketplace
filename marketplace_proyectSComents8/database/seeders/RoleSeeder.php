<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $vendedores = Role::create(['name' => 'Vendedores']);

        Permission::create(['name' => 'admin.home','description'=> 'Ver panel de Administrador'])->syncRoles([$admin, $vendedores]);

        //User management, 'description'
        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Añadir rol'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar usuarios'])->syncRoles([$admin]);
        
        // Permission to create category
        Permission::create(['name' => 'admin.categories.index','description' => 'Ver listado de  categorias'])->syncRoles([$admin,$vendedores]);
        Permission::create(['name' => 'admin.categories.create','description' => 'Crear categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit','description' => 'Editar categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy','description' => 'Eliminar categorias'])->syncRoles([$admin]);

        //Permissions to create tags

        Permission::create(['name' => 'admin.tags.index','description' => 'Ver listado de etiquetas'])->syncRoles([$admin,$vendedores]);
        Permission::create(['name' => 'admin.tags.create','description' => 'Crear etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit','description' => 'Editar etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy','description' => 'Eliminar etiquetas'])->syncRoles([$admin]);

        //Permissions to create products
        Permission::create(['name' => 'admin.products.index','description' => 'Ver listado de productos'])->syncRoles([$admin, $vendedores]);
        Permission::create(['name' => 'admin.products.create','description' => 'Crear productos'])->syncRoles([$admin, $vendedores]);
        Permission::create(['name' => 'admin.products.edit','description' => 'Editar productos'])->syncRoles([$admin, $vendedores]);
        Permission::create(['name' => 'admin.products.destroy','description' => 'Eliminar productos'])->syncRoles([$admin, $vendedores]);

        //Permissions to create roles

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear nuevo rol'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar rol'])->syncRoles([$admin]);

        //Permissions to view sales
        Permission::create(['name' => 'admin.sales.index', 'description' => 'Ver listado de ventas'])->syncRoles([$admin, $vendedores]);
        Permission::create(['name' => 'admin.sales.view', 'description' => 'Ver datos del comprador'])->syncRoles([$admin, $vendedores]);

    }
}
