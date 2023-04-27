<?php

namespace App\Actions\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthenticateAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

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

        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
