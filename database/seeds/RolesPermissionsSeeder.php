<?php

use Illuminate\Database\Seeder;
use App\Models\Management\RolePermission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //permissões comuns
        RolePermission::updateOrCreate(['id' => 1],
            [
                'role_id'       => 1,
                'permission_id' => 1
            ]
        );
        RolePermission::updateOrCreate(['id' => 2],
            [
                'role_id'       => 1,
                'permission_id' => 3
            ]
        );
        RolePermission::updateOrCreate(['id' => 3],
            [
                'role_id'       => 1,
                'permission_id' => 4
            ]
        );
        RolePermission::updateOrCreate(['id' => 4],
            [
                'role_id'       => 1,
                'permission_id' => 5
            ]
        );
        RolePermission::updateOrCreate(['id' => 5],
            [
                'role_id'       => 1,
                'permission_id' => 6
            ]
        );
        RolePermission::updateOrCreate(['id' => 6],
            [
                'role_id'       => 1,
                'permission_id' => 7
            ]
        );
        RolePermission::updateOrCreate(['id' => 7],
            [
                'role_id'       => 1,
                'permission_id' => 8
            ]
        );
        RolePermission::updateOrCreate(['id' => 8],
            [
                'role_id'       => 1,
                'permission_id' => 26
            ]
        );
        RolePermission::updateOrCreate(['id' => 9],
            [
                'role_id'       => 1,
                'permission_id' => 27
            ]
        );
        //permissoes comuns

        //cliente
        RolePermission::updateOrCreate(['id' => 10],
            [
                'role_id'       => 2,
                'permission_id' => 2
            ]
        );

    }
}
