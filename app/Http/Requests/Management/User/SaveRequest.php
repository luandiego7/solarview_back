<?php

namespace App\Http\Requests\Management\User;

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
            'company_id' => 'Empresa',
            'role_id'    => 'Função',
            'name'       => 'Nome',
            'email'      => 'E-mail',
        ];
    }

    public function rules()
    {
        return [
            'company_id' => ['nullable', 'alpha_num'],
            'role_id'    => ['nullable'],
            'name'       => ['required', 'min:5', 'max:100', 'alpha_digit_number'],
            'email'      => ['required', 'min:10', 'max:100', 'email', Rule::unique('users', 'email')->ignore($this->id)],
        ];
    }
}
