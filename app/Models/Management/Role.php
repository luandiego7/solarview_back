<?php

namespace App\Models\Management;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table   = 'roles';
    protected $fillable = ['company_id', 'name'];

    public function isNew()
    {
        return is_null($this->id);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function getPermissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id', 'id')->with(['getRole', 'getPermission']);
    }

    static function getRoles($request = [])
    {
        $roles = Role::with(['getCompany', 'getPermissions']);

        if(isset($request['id']) && $request['id'] !== ""){
            $roles->where('id', $request['id']);
        }

        if(isset($request['company_id']) && $request['company_id'] !== ""){
            $roles->where('company_id', $request['company_id']);
        }

        return $roles;

    }
}
