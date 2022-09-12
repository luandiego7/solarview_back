<?php

namespace App\Models\Management;

use App\Models\Management\Role;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table   = 'roles_permissions';
    protected $fillable = ['role_id', 'permission_id'];

    public function getRole()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function getPermission()
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }
}
