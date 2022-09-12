<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class RoleGroup extends Model
{
    protected $table   = 'roles_groups';
    protected $fillable = ['name', 'icon'];

    public static $grupos = [
        1  => 'Home',
        2  => 'Perfil',
        3  => 'Usuários',
        4  => 'Funções',
        5  => 'Outros',
        6  => 'CLientes',
        7  => 'Unidades',
        8  => 'Ambientes',
        9  => 'Equipamentos',
        10 => 'Cargos',
        11 => 'Colaboradores',
        12 => 'Manutenção',
    ];

    const GROUP_HOME           = 1;
    const GROUP_PROFILE        = 2;
    const GROUP_USERS          = 3;
    const GROUP_ROLES          = 4;
    const GROUP_OTHERS         = 5;
    const GROUP_CLIENTS        = 6;
    const GROUP_OFFICES        = 7;
    const GROUP_AMBIENCES      = 8;
    const GROUP_EQUIPMENTS     = 9;
    const GROUP_EMPLOYEE_ROLES = 10;
    const GROUP_EMPLOYEES      = 11;
    const GROUP_MAINTENANCE    = 12;

    public function getPermissions()
    {
        return $this->hasMany(Permission::class, 'role_group_id', 'id');
    }

    static function getTotalPermissions($group, $role_id)
    {
        $totalGroup = $group->getPermissions->count();
        $totalRole  = 0;

        foreach($group->getPermissions as $permission){
            $totalRole += $permission->getRolesPermissions->where('role_id', $role_id)->count();
        }

        return ['totalGroup' => $totalGroup, 'totalRole' => $totalRole];
    }


}
