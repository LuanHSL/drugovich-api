<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UpdateGroupServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $group = Group::where('id', $request->id)->first();

        if (empty($group)) {
            return response()->json("grupo não encontrado com sucesso");
        }

        $group->name = $request->name;
        $group->save();

        return response()->json("grupo atualizado com sucesso");
    }
}
