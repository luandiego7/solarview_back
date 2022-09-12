<?php

namespace App\Models\Management;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table    = 'roles_users';
    protected $fillable = ['role_id', 'user_id'];

    public function getRole()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
