<?php

namespace App\Models\Management;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    protected $table    = 'companies_users';
    protected $fillable = ['company_id', 'user_id', 'status'];

    const STATUS_ATIVO   = 1;
    const STATUS_INATIVO = 2;

    public function getCompany()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
