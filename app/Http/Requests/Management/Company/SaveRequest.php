<?php

namespace App\Http\Requests\Management\Company;

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
            'city_id'      => 'Cidade',
            'fantasy_name' => 'Fantasia',
            'social_name'  => 'Razão Social',
            'cnpj'         => 'CNPJ',
            'email'        => 'E-mail',
            'contact'      => 'Contato',
            'cep'          => 'CEP',
            'address'      => 'Endereço',
            'number'       => 'Número',
            'complement'   => 'Complemento',
            'neighborhood' => 'Bairro',
            'ie'           => 'Inscrição Estadual',
            'im'           => 'Inscrição Municipal',
            'site'         => 'Site',
            'logo'         => 'Logo',
            'description'  => 'Descrição',
        ];
    }

    public function rules()
    {
        return [
            'id'           => ['nullable', 'alpha_num'],
            'city_id'      => ['required', 'alpha_num'],
            'fantasy_name' => ['required', 'min:2', 'max:100', 'alpha_digit_number'],
            'social_name'  => ['required', 'min:2', 'max:100', 'alpha_digit_number'],
            'cnpj'         => ['required', 'min:18', 'max:18', 'format_cnpj', 'cnpj', Rule::unique('companies', 'cnpj')->ignore($this->id)],
            'email'        => ['required', 'min:10', 'max:100', 'email', Rule::unique('companies', 'email')->ignore($this->id)],
            'contact'      => ['nullable', 'min:13', 'max:14'],
            'cep'          => ['nullable', 'min:9', 'max:9', 'format_cep'],
            'address'      => ['nullable', 'min:10', 'max:100' ],
            'number'       => ['nullable', 'max:10'],
            'complement'   => ['nullable', 'min:5', 'max:200'],
            'neighborhood' => ['nullable', 'min:10', 'max:100'],
            'ie'           => ['nullable', 'max:20'],
            'im'           => ['nullable', 'max:20'],
            'site'         => ['nullable', 'min:10', 'max:100', 'url'],
            'logo'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'site'         => ['nullable', 'text'],
        ];
    }
}
