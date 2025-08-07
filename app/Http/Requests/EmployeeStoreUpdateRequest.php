<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employees')->ignore($this->id),
            ],
            'jira_account_id' => [
                'nullable',
                'string',
                Rule::unique('employees')->ignore($this->id),
            ],
            'status' => [
                'required',
                'integer',
                'in:1,2',
            ],
            'squads' => [
                'nullable',
                'array',
            ],
            'squads.*' => [
                'integer',
                'exists:squads,id',
            ],
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email informado é inválido!',
            'email.max' => 'O email não pode ter mais de 255 caracteres.',
            'email.unique' => 'O email já está em uso.',

            'jira_account_id.unique' => 'O ID do Jira já está em uso.',

            'status.required' => 'O campo status é obrigatório.',
            'status.integer' => 'O campo status deve ser um número inteiro.',
            'status.in' => 'O campo status deve ser 1 ou 2.',

            'squads.array' => 'O campo squads deve ser uma lista.',
            'squads.*.exists' => 'Um dos squads informados não existe.',
        ];
    }
}
