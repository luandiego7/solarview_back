<?php

namespace App\Http\Requests\Management\Permission;

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
            'role_group_id'=> 'Cidade',
            'name'         => 'Nome',
            'route'        => 'Rota',
            'description'  => 'Descrição',
        ];
    }

    public function rules()
    {
        return [
            'id'           => ['nullable', 'alpha_num'],
            'role_group_id'=> ['required', 'alpha_num'],
            'name'         => ['required', 'min:2',  'max:100', 'alpha_digit_number', Rule::unique('permissions', 'name')->ignore($this->id)],
            'route'        => ['required', 'min:2',  'max:100', 'alpha_digit_number', Rule::unique('permissions', 'route')->ignore($this->id)],
            'description'  => ['required', 'min:10', 'max:191', 'alpha_digit_number']
        ];
    }
}
