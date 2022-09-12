<?php

namespace App\Http\Controllers;

use App\Helpers\Format;
use App\Models\City;

class AddressController extends Controller
{
    public function getCepAddress($cep)
    {
        $address  = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
        if($address->resultado == 1){

            $cities = City::with(['getState'])
                ->select('cities.*')
                ->join('states', 'states.id', '=', 'cities.state_id')
                ->where('states.uf', $address->uf)
                ->get();

            $city = $cities->filter(function($value, $index) use($address){
               return $value->name == $address->cidade;
            })->first();

            return response()->json(['status' => '200',
                'address'  => $address,
                'state_id' => $city->state_id,
                'city_id'  => $city->id,
                'cities'   => Format::formatSelect2($cities)
            ]);
        }else{
            return response()->json(['status' => '500', 'msg' => 'CEP inválido !!!']);
        }
    }
}
