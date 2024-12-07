<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManodeobraRequest extends FormRequest
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
			'idManodeobra' => 'required',
			'Nombremanodeobra' => 'required|string',
			'Cantidad' => 'required',
			'Descripcion' => 'required|string',
			'Estado' => 'required|string',
			'Codigo' => 'required|string',
			'Unidad' => 'required|string',
			'Fecha' => 'required|string',
        ];
    }
}
