<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table   = 'permissions';
    protected $fillable = [ 'role_group_id', 'name', 'route', 'description'];

    public function isNew()
    {
        return is_null($this->id);
    }

    public function getGroup()
    {
        return $this->hasOne(RoleGroup::class, 'id', 'role_group_id');
    }

    public function getRolesPermissions()
    {
        return $this->hasMany(RolePermission::class, 'permission_id', 'id')->with(['getRole', 'getPermission']);
    }

    static function getPermissionsLoggedUser()
    {
        return Permission::select('permissions.id', 'permissions.route', 'permissions.role_group_id')
            ->join('roles_permissions', 'roles_permissions.permission_id', '=', 'permissions.id')
            ->join('roles', 'roles.id', '=', 'roles_permissions.role_id')
            ->join('roles_users', 'roles_users.role_id', '=', 'roles.id')
            ->where('roles_users.user_id', auth()->user()->id)
            ->orderBy('permissions.id')
            ->groupBy('permissions.id')
            ->groupBy('permissions.role_group_id')
            ->groupBy('permissions.route')
            ->get();
    }

    static function permissionsLoggedUser()
    {
        return session('user_permissions');
    }

    static function hasPermission($permissao)
    {
        $permissoes = Permission::permissoesUsuarioLogado()
            ->pluck('rota')
            ->toArray();

        if(in_array($permissao, $permissoes) or auth()->user()->isSuperadmin()){
            return true;
        }
        return false;
    }

    static function getPermissions($request = [])
    {
        $permissions = Permission::with(['getGroup', 'getRolesPermissions']);

        if(isset($request['id']) && $request['id'] !== ''){
            $permissions->where('id', $request['id']);
        }

        return $permissions;
    }
}
