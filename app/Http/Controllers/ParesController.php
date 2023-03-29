<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParesRequest;

/**
 * @group Pares
 *
 * Api para obtener el numero de pares que coinciden con un valor en especifico.
 */
class ParesController extends BaseController
{
    public function index()
    {
        return view('calcular_pares');
    }
    /**
     * Pares de Arreglo segun Diferencia
     * Obtener el numero de pares de elemento de la matriz que tienen una diferencia igual al valor del objetivo.
     *
     * @bodyParam  valor_objetivo numeric required Valor Objetivo  Example: 2
     * @bodyParam  arreglo array required Arreglo de enteros  Example: [1,2,3,4,5]
     * @response {
     * "message": "Calculo realizado correctamente",
     *  "value": 3
     *   }
     */
    public function store(ParesRequest $request)
    {
        $response = pares($request->valor_objetivo, $request->arreglo);
        return $this->response->array(['message' => 'Calculo realizado correctamente', 'value' =>  $response])->setStatusCode(200);
    }
}
