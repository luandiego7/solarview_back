<?php

namespace App\Http\Requests\Management\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
        ];
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:2',  'max:100', 'alpha_digit_number'],
        ];
    }
}
