<?php

namespace App\Models\Management;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table   = 'companies';
    protected $fillable = [ 'city_id', 'social_name', 'fantasy_name', 'cnpj', 'email', 'contact', 'cep', 'address', 'number', 'complement', 'neighborhood', 'ie', 'im', 'site', 'logo', 'description', 'status' ];

    const STATUS_ATIVO   = 1;
    const STATUS_INATIVO = 0;

    public function isNew()
    {
        return is_null($this->id);
    }

    public function getCity()
    {
        return $this->hasOne(City::class, 'id', 'city_id')->with(['getState']);
    }

    static function getEmpresaLogada()
    {
        return session()->get('empresa');
    }

    static function getLogo($logo)
    {
        if(is_null($logo) || $logo == ""){
            $logo = asset('/images/default/default-logo.png');
        }
        return $logo;
    }

    static function getCompanies($request = [])
    {
        $companies = Company::with(['getCity']);

        if(isset($request['id']) && $request['id'] !== ''){
            $companies->where('id', $request['id']);
        }

        return $companies;
    }
}
