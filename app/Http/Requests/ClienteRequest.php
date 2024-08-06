<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        return [
            //
            'dni_cliente' => 'required|numeric|unique:clients,dni|min:10',
            'nombre_cliente' => 'required|string|max:50|min:3',
            'apellido_cliente' => 'required|string|max:50|min:3',
            'email_cliente' => 'required|email|unique:clients,email|max:30|min:3',
            'tlf_cliente' => 'required|numeric|min:15',
            'direccion_cliente' => 'required|max:50|min:3',
            'estado_cliente'  => 'required'
        ];
    }
}
