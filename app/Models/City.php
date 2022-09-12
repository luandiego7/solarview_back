<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table    = 'cities';
    protected $fillable = [ 'state_id', 'name', 'ibge' ];

    public function getState()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    static function getCities($request = [])
    {
        $cidades = City::with(['getState'])
            ->select('cities.*')
            ->join('states', 'states.id', '=', 'cities.state_id');

        if(isset($request['state_id']) && $request['state_id'] !== ""){
            $cidades->where('cities.state_id', $request['state_id']);
        }

        if(isset($request['uf']) && $request['uf'] !== ""){
            $cidades->where('states.uf', $request['uf']);
        }

        return $cidades;
    }
}
