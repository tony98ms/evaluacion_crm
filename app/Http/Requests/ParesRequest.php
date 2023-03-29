<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ParesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'valor_objetivo' => 'required|integer|between:0,10',
            'arreglo' => 'required|distinct|array|min:2|max:10',
            'arreglo.*' => 'distinct|numeric|min:1',
        ];
    }
    public function messages()
    {
        return [
            'valor_objetivo.required' => 'El valor para realizar la función es requerido',
            'valor_objetivo.integer' => 'El valor ingresado no tiene el formato correcto',
            'valor_objetivo.between' => 'El valor ingresado debe ser un entero entre 0 y 10',
            'arreglo.required' => 'El arreglo de enteros es requerido',
            'arreglo.array' => 'El valor no contiene un formato correcto.',
            'arreglo.min' => 'El arreglo debe tener minimo 2 valores.',
            'arreglo.max' => 'El arreglo debe tener maximo 10 valores.',
            'arreglo.*.distinct' => 'El arreglo tiene numeros repetidos.',
            'arreglo.*.min' => 'El numero del arreglo deben ser mayor que 0.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $clientes = collect($this->validator->errors())->undot()->toArray();

        throw new HttpResponseException(response()
            ->json([
                'status' => 422,
                'message' => 'Hubo un error de validación',
                'errors' =>  $clientes
            ], 422));
    }
}
