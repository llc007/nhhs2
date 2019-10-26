<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Usuarios
        Permission::create([
            'name' => 'Ver lista de  usuarios',
            'slug' => 'users.index',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Ver usuario',
            'slug' => 'users.show',
            'description' => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de usuarios',
            'slug' => 'users.edit',
            'description' => 'Editar cualquier usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'users.destroy',
            'description' => 'Eliminar cualquier usuario del sistema',
        ]);

        //Encuesta
        Permission::create([
            'name' => 'Ver lista de encuestas',
            'slug' => 'encuestas.index',
            'description' => 'Lista y navega todas las encuestas del sistema',
        ]);
        Permission::create([
            'name' => 'Ver encuesta',
            'slug' => 'encuestas.show',
            'description' => 'Ver en detalle cada encuesta del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de encuesta',
            'slug' => 'encuestas.edit',
            'description' => 'Editar cualquier encuesta del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar encuesta',
            'slug' => 'encuestas.destroy',
            'description' => 'Eliminar cualquier encuesta del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de una encuesta',
            'slug' => 'encuestas.create',
            'description' => 'Crear una encuesta en el sistema',
        ]);

        //Roles
        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de rol',
            'slug' => 'roles.show',
            'description' => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de un rol',
            'slug' => 'roles.create',
            'description' => 'Crear un rol en el sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de rol',
            'slug' => 'roles.edit',
            'description' => 'Editar cualquier rol del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar cualquier rol del sistema',
        ]);


    }
}
