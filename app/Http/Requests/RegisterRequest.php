<?php

namespace App\Http\Requests;

use App\Enum\UserRoleEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'cpf' => ['required', 'string', 'size:11', 'unique:users'],
            'birth-date' => ['required', 'date'],
            'role' => ['required', Rule::enum(UserRoleEnum::class)],
            'zip-code' => ['required', 'string', 'between:8,9'],
            'street' => ['required', 'string', 'max:100'],
            'address-number' => ['nullable', 'string', 'max:5'],
            'district' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'uf' => ['required', 'string', 'size:2'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    /**
     * Get data from request
     *
     * @return array
     */
    public function getData(): array
    {
        $fields = $this->safe()->except(['birth-date', 'zip-code', 'address-number']);

        return array_merge($fields, [
            'birth_date' => $this->safe()->{'birth-date'},
            'zip_code' => $this->safe()->{'zip-code'},
            'address_number' => $this->safe()->{'address-number'},
        ]);
    }
}
