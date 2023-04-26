<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeleteCustumerServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $id): JsonResponse
    {
        $customer = Customer::where('id', $id)->first();
        if (empty($customer)) {
            return response()->json("cliente não existe");
        }

        $customer->delete();
        return response()->json("cliente deletado com sucesso");
    }
}
