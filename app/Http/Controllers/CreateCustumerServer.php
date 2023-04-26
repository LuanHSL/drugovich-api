<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CreateCustumerServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $existGroup = Group::where('id', $request->group_id)->exists();

        if (!$existGroup) {
            return response()->json("grupo não encontrado");
        }
        Customer::create($request->toArray());

        return response()->json("cliente cadastrado com sucesso");
    }
}
