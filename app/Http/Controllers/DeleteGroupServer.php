<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeleteGroupServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $id): JsonResponse
    {
        $group = Group::where('id', $id)->first();
        if (empty($group)) {
            return response()->json("grupo não existe");
        }

        $existCustomer = Customer::where('group_id', $id)->exists();
        if($existCustomer) {
            return response()->json("não pode deletar esse grupo, pois existem clientes com esse grupo selecionado");
        }

        $group->delete();
        return response()->json("grupo deletado com sucesso");
    }
}
