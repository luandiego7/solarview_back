<?php

namespace App\Http\Controllers;

use App\Helpers\Format;
use App\Models\City;
use App\Models\State;

class StateController extends Controller
{
    public function getStates()
    {
        $states = Format::formatSelect2(State::all());
        return response()->json(['states' => $states]);
    }

    public function getCitiesByState($state_id)
    {
        $cities = Format::formatSelect2(City::getCities(['state_id' => $state_id])->get());
        return response()->json([ 'cities' => $cities]);
    }
}
