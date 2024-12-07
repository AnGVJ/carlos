<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HerramientasymaterialeRequest extends FormRequest
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
			'idMateriales' => 'required',
			'Codigo' => 'required',
			'Nombremateriales' => 'required|string',
			'Cantidad' => 'required',
			'fecha' => 'required',
			'Unidad' => 'required|string',
        ];
    }
}
