<?php

namespace App\Models\User;

use App\Models\City;
use App\Models\Management\CompanyUser;
use App\Models\Management\RoleUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $fillable = [ 'city_id', 'profile', 'name', 'email', 'cpf', 'rg', 'genre', 'birthday', 'contact', 'cep', 'address', 'neighborhood', 'complement', 'number', 'course', 'institution', 'profession', 'description', 'status', 'photo', 'background', 'password'];
    protected $hidden   = [ 'password', 'remember_token',];

    const PROFILE_COMPANY = 1;
    const PROFILE_CLIENT  = 2;

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    public static $reasons_support = [1 => 'Elogio', 2 => 'Sugestão', 3 => 'Dúvida', 4 => 'Crítica', 5 => 'Erro/Problema', 6 => 'Outro motivo'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isSuperadmin()
    {
        return $this->superadmin == 1;
    }

    public function getCity()
    {
        return $this->hasOne(City::class, 'id', 'city_id')->with(['getState']);
    }

    public function getCompanyUser()
    {
        return $this->hasOne(CompanyUser::class, 'user_id', 'id')->with(['getCompany']);
    }

    public function getRoles()
    {
        return $this->hasMany(RoleUser::class, 'user_id', 'id');
    }

    static function getPhoto(){

    }

    static function getUsers($request = [])
    {
        $user = User::with(['getCity', 'getCompanyUser', 'getRoles']);

        if(isset($request['id']) && $request['id'] !== ''){
            $user->where('id', $request['id']);
        }

        return $user;
    }

}
