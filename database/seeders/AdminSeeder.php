<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'addfuncionario']);
        $permission = Permission::create(['name' => 'listfuncionario']);
        $permission = Permission::create(['name' => 'viewfuncionario']);
        $permission = Permission::create(['name' => 'updatefuncionario']);
        $permission = Permission::create(['name' => 'deletefuncionario']);

        $permission = Permission::create(['name' => 'addtarefa']);
        $permission = Permission::create(['name' => 'listtarefa']);
        $permission = Permission::create(['name' => 'viewtarefa']);
        $permission = Permission::create(['name' => 'updatetarefa']);
        $permission = Permission::create(['name' => 'deletetarefa']);
        $permission = Permission::create(['name' => 'aprovartarefa']);
        $permission = Permission::create(['name' => 'reprovartarefa']);
        $permission = Permission::create(['name' => 'kanban']);

        $role_admin = Role::create(['name' => 'Administrador']);
        $role_admin->givePermissionTo('addfuncionario');
        $role_admin->givePermissionTo('listfuncionario');
        $role_admin->givePermissionTo('viewfuncionario');
        $role_admin->givePermissionTo('updatefuncionario');
        $role_admin->givePermissionTo('deletefuncionario');
        $role_admin->givePermissionTo('addtarefa');
        $role_admin->givePermissionTo('listtarefa');
        $role_admin->givePermissionTo('viewtarefa');
        $role_admin->givePermissionTo('updatetarefa');
        $role_admin->givePermissionTo('deletetarefa');
        $role_admin->givePermissionTo('aprovartarefa');
        $role_admin->givePermissionTo('reprovartarefa');
        $role_admin->givePermissionTo('kanban');

        $role_gestor = Role::create(['name' => 'Gestor']);
        $role_gestor->givePermissionTo('addtarefa');
        $role_gestor->givePermissionTo('listtarefa');
        $role_gestor->givePermissionTo('viewtarefa');
        $role_gestor->givePermissionTo('updatetarefa');
        $role_gestor->givePermissionTo('deletetarefa');
        $role_gestor->givePermissionTo('aprovartarefa');
        $role_gestor->givePermissionTo('reprovartarefa');
        $role_gestor->givePermissionTo('kanban');

        $role_tecnico = Role::create(['name' => 'Tecnico']);
        $role_tecnico->givePermissionTo('kanban');

        Categoria::create(['categoria'=>'Administrador']);
        Categoria::create(['categoria'=>'Gestor']);
        Categoria::create(['categoria'=>'Tecnico']);

        Funcionario::create([
            'nome'=>'Administrador',
            'telefone'=>'999999999',
            'categoria_id'=>'1'
        ]);

        User::create([
            'name'=>'#admin',
            'email'=>'admin@sgtarefa.com',
            'password' => Hash::make('@angelo123'),
            'funcionario_id'=>'1',
        ])->assignRole($role_admin);




    }
}
