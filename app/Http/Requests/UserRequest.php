<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.($userId ? $userId->id : null),
            'password' => 'required|min:6',
            // 'password' => $this->isMethod('PUT') ? 'sometimes|min:6' : 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Necessário enviar um e-mail válido',
            'email.unique' => 'E-mail já cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'Senha com no mínimo :min caracteres',
        ];
    }
}
