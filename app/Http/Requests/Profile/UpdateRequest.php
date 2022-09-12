<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'city_id'      => 'Cidade',
            'name'         => 'Nome',
            'email'        => 'E-mail',
            'cpf'          => 'CPF',
            'rg'           => 'RG',
            'genre'        => 'Gênero',
            'birthday'     => 'Data de Nascimento',
            'contact'      => 'Contato',
            'cep'          => 'CEP',
            'address'      => 'Endereço',
            'neighborhood' => 'Bairro',
            'complement'   => 'Complemento',
            'number'       => 'Número',
            'course'       => 'Curso',
            'institution'  => 'Instituição',
            'profession'   => 'Profissão',
            'description'  => 'Descrição',
            'photo'        => 'Foto',
        ];
    }

    public function rules()
    {
        return [
            'id'           => ['required', 'alpha_num'],
            'city_id'      => ['nullable', 'alpha_num'],
            'name'         => ['required', 'min:2', 'max:100', 'alpha_digit_number'],
            'email'        => ['required', 'min:10', 'max:100', 'email', Rule::unique('users', 'email')->ignore($this->id)],
            'cpf'          => ['nullable', 'min:14', 'max:14', 'cpf', 'format_cpf', Rule::unique('users', 'cpf')->ignore($this->id)],
            'rg'           => ['nullable', 'max:20', 'alpha_num'],
            'genre'        => ['nullable', 'max:20'],
            'birthday'     => ['nullable', 'min:10', 'max:10', 'date_format:d/m/Y'],
            'contact'      => ['nullable', 'min:10', 'max:14'],
            'cep'          => ['nullable', 'min:9', 'max:9', 'format_cep'],
            'address'      => ['nullable', 'min:10', 'max:100' ],
            'number'       => ['nullable', 'max:10'],
            'complement'   => ['nullable', 'min:10', 'max:200'],
            'neighborhood' => ['nullable', 'min:10', 'max:100'],
            'course'       => ['nullable', 'min:2', 'max:100'],
            'institution'  => ['nullable', 'min:2', 'max:100'],
            'profession'   => ['nullable', 'min:2', 'max:100'],
            'photo'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        ];
    }
}
