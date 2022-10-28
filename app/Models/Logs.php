<?php

namespace App\Models;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table    = 'logs';
    protected $fillable = ['user_id', 'ip', 'created_at'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
