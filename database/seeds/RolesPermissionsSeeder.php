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
        RolePermission::updateOrCreate(['id' => 11],
            [
                'role_id'       => 2,
                'permission_id' => 37
            ]
        );
        RolePermission::updateOrCreate(['id' => 12],
            [
                'role_id'       => 2,
                'permission_id' => 40
            ]
        );
        RolePermission::updateOrCreate(['id' => 13],
            [
                'role_id'       => 2,
                'permission_id' => 41
            ]
        );
        RolePermission::updateOrCreate(['id' => 14],
            [
                'role_id'       => 2,
                'permission_id' => 46
            ]
        );
        RolePermission::updateOrCreate(['id' => 15],
            [
                'role_id'       => 2,
                'permission_id' => 49
            ]
        );
        RolePermission::updateOrCreate(['id' => 16],
            [
                'role_id'       => 2,
                'permission_id' => 50
            ]
        );
        RolePermission::updateOrCreate(['id' => 17],
            [
                'role_id'       => 2,
                'permission_id' => 55
            ]
        );
        RolePermission::updateOrCreate(['id' => 18],
            [
                'role_id'       => 2,
                'permission_id' => 58
            ]
        );
        RolePermission::updateOrCreate(['id' => 19],
            [
                'role_id'       => 2,
                'permission_id' => 59
            ]
        );
        RolePermission::updateOrCreate(['id' => 20],
            [
                'role_id'       => 2,
                'permission_id' => 80
            ]
        );
        RolePermission::updateOrCreate(['id' => 21],
            [
                'role_id'       => 2,
                'permission_id' => 86
            ]
        );
        RolePermission::updateOrCreate(['id' => 22],
            [
                'role_id'       => 2,
                'permission_id' => 90
            ]
        );
        RolePermission::updateOrCreate(['id' => 23],
            [
                'role_id'       => 2,
                'permission_id' => 91
            ]
        );

    }
}
