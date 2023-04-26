<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoginServer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $auth = auth()->guard('manager');

        if (!$auth->attempt($credentials)) {
            $auth->logout();
            return response()->json("gerente nao existe");
        }

        return response()->json($auth->user());

    }
}
